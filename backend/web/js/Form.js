(function(App){
    App.Form = function(options) {
        this.$formSelector = options.formSelector;
        this.afterSaveReset = options.afterSaveReset || false;
        this.$form = null;
        this.bindEvents();
    };

    App.Form.prototype.bindEvents = function() {
        var $this = this;
        $('body').delegate(this.$formSelector, "submit", function (e) {
            $this.$form = $($this.$formSelector);
            $this.action = $($this.$formSelector);
            $this.$submitButton = $this.$form.find('[type=submit]');
            $this.$containerSelector = $this.$form.attr('data-container');
            $this.action = $this.$form.attr('action');
            $this.submit();
            return false;
        });
    };

    App.Form.prototype.submit = function() {
        var $this = this,
            data = new FormData(this.$form[0]);

        this.$submitButton.attr('disabled', 'disabled');

        $.ajax({
            data:data,
            url:this.action,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
        })
        .success(function() {
            $this.onSuccess();
        })
        .error(function() {
            $this.onError();
        })
        .always(function() {
            $this.onComplete();
        });
        return false;
    };

    App.Form.prototype.onSuccess = function(e) {
        try {
            if (e && e.errors) {
                this.handleErrors(e.errors);
            } else {
                this.handleResult(e);
            }
        }catch(e){
            this.onError(e);
        }
    };

    App.Form.prototype.handleResult = function(e) {
        this.reloadPjaxContainer();
        if (this.afterSaveReset) {
            this.$form.trigger('reset');
            this.$form.parents('.modal.in').modal('hide');
        }
        $(this).trigger('form:success');
    };

    App.Form.prototype.handleErrors = function(e) {
        var formAttr = this.$form.data('yiiActiveForm');
        var messages = {};
        $.each(formAttr.attributes, function () {
            var id = this.id;
            var name = this.name;
            if (e[name]) {
                messages[id] = errors[name];
            }
        });
        this.$form.yiiActiveForm('updateMessages', messages);
        $(this).trigger('form:handleErrors', messages);
    };

    App.Form.prototype.onError = function(e) {
        this.$form.find('.form-result').html(e);
        $(this).trigger('form:error', e);
        console.error(e);
    };

    App.Form.prototype.reloadPjaxContainer = function(e) {

        if (!this.$containerSelector) return false;

        if (this.$containerSelector.charAt(0) != '#' && this.$containerSelector.charAt(0) != '.') {
            this.$containerSelector = '#'+this.$containerSelector;
        }
        var $this = this;
        $(document).on('pjax:success', $this.onReloadSuccess.bind(this));
        reloadPjaxContainer(this.$containerSelector);
    };

    App.Form.prototype.onComplete = function(e) {
        this.$submitButton.removeAttr('disabled');
        $(this).trigger('form:complete');
    };

    App.Form.prototype.onReloadSuccess = function(e) {
        $(this).trigger('form:reloadSuccess');
        $(document).off('pjax:success', this.onReloadSuccess);
    };

    return App.Form;
})(window.App || (window.App = {}))