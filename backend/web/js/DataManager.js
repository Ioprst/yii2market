(function(App){
    App.DataManager = function(options) {
        this.dataForm =  null;
        this.setup();
    }

    App.DataManager.prototype.setup = function() {
        this.setupDataForm();
        this.bindEvents();
    };

    App.DataManager.prototype.setupDataForm = function() {
        this.dataForm = new App.Form({
            formSelector: '.ess-form',
            afterSaveReset: true
        });
    }

    App.DataManager.prototype.bindEvents = function() {
        var $this = this;

        $('body').delegate('.modal.reset', "hide.bs.modal", function (e) {
            if (e.target == this) {
                $(this).removeData('bs.modal');
                $(this).find('.modal-content').html('');
            }
        });

        $('body').delegate('.remove-ess', "click", function(event) {

            if (!confirm('Удалить запись?')) return false;

            var dataId = $(this).attr('data-model');
            var dataUrl = $(this).attr('data-url');
            var containerSelector = $(this).attr('data-container');

            if (!containerSelector) {
                console.error('Для формы не указан селектор контайнера данных для перезагрузки');
            }

            $this.removeRecord(dataId, dataUrl, containerSelector)
            return false;
        });
    };

    App.DataManager.prototype.removeRecord = function(dataId, dataUrl, containerSelector) {
        $.ajax({
           url:dataUrl,
           type: 'POST',
           dataType: 'json',
           processData: false,
           contentType: false,
       })
       .success(function() {
           reloadPjaxContainer(containerSelector);
           $('.remove-ess[data-model='+ dataId +']').trigger('ess:remove');
       })
       .error(function() {
           alert('Не удалось удалить запись');
       })
    }

    return App.DataManager;

})(App || (window.App = {}))

$(function() {
    var DataManager = new App.DataManager;
});