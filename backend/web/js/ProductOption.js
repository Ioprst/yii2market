(function(App){
    App.ProductOption = function() {
        this.setup();
    }

    App.ProductOption.prototype.setup = function() {
        this.bindEvents();
    };

    App.ProductOption.prototype.bindEvents = function() {
        var $this = this;
        $('body').delegate('.add-option-value', 'click', function(event) {
            $this.renderInputField();
            return false;
        });

        $('body').delegate('.remove-option-value', 'click', function(event) {
            if (!confirm('Удалить значениe?')) return false;
            var id = $(this).data('id');
            $this.removeOptionValue(id);
            return false;
        });

    };

    App.ProductOption.prototype.removeOptionValue = function(id) {
        $.ajax({
            url: '/admin/option/delete-value?id=' + id,
            type: 'POST',
            dataType: 'json',
        })
        .success(function() {
            $('#option-input-container-'+ id).remove();
        })
        .error(function() {
            alert('Не удалось удалить значениe');
        })
    };

    App.ProductOption.prototype.renderInputField = function() {
        var index = $('.product-option-container').find('.option-input-container').length;
        $('.product-option-container').append(App.ProductOption.inputTemplate(index));
    };

    App.ProductOption.inputTemplate = function(index) {
        return '<div class="option-input-container">' +
        '<input type="hidden" value="" name="OptionValue['+ index +'][id]">'+
        '<input type="text" name="OptionValue['+ index +'][text]" placeholder="Введите значениe" class="form-control product-option" />'+
        '<button type="button" name="remove" class="btn btn-danger remove-option-value"><span class="fa fa-remove"></span>'+
        '</button>'+
        '</div>'
    }

    return App.ProductOption;

})(App || (window.App = {}))

var ProductOption = new App.ProductOption;