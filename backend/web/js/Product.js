(function(App){
    App.Product = function() {
        this.setup();
    }

    App.Product.prototype.setup = function() {
        this.bindEvents();
    };

    App.Product.prototype.bindEvents = function() {
        var $this = this;
        $('body').delegate('.add-product-option', 'click', function(event) {
            var productId = $(this).data('model');
            $this.renderOptionSelector(productId);
            return false;
        });

        $('body').delegate('.remove-option', 'click', function(event) {
            var optionId = $(this).data('option');
            var modelId = $(this).data('model');

            if (!optionId) {
                $(this).parents('.option-container').remove();
                return false;
            }

            if (!confirm('Удалить опцию?')) return false;

            $this.removeOption(optionId, modelId);
            return false;
        });

        $('body').delegate('.product-option', 'change', function(event) {
            var optionId = $(this).val();
            $this.renderOptionValueSelector(optionId, this);
            return false;
        });

        $('body').delegate('.product-value', 'change', function(event) {
            var optionId = $(this).data('option');
            var productId = $(this).data('product');
            if (!optionId || !productId) return false;

            var valueId = $(this).val();
            $this.changeOptionValue(optionId, productId, valueId);
            return false;
        });
    };

    App.Product.prototype.renderOptionSelector = function(productId) {
        $.get('/admin/option/list?product='+ productId, function(data) {
            if (data.error) {
                alert(data.error);
                return false;
            }
            $('.product-option-container').append(data);
        });
    };

    App.Product.prototype.renderOptionValueSelector = function(optionId, element) {

        if (!optionId) return;

        $.get('/admin/option/value-list?option='+ optionId, function(data) {
            $(element).parents('.option-container').find('.value-container').html(data);
        });
    };

    App.Product.prototype.changeOptionValue = function(optionId, productId, valueId) {
        $.ajax({
            url: '/admin/product/change-value?option=' + optionId + '&product=' +productId + '&value=' + valueId,
            type: 'POST',
            dataType: 'json',
        })
        .success(function() {
        })
        .error(function() {
        })
    };

    App.Product.prototype.removeOption = function(optionId, modelId) {
        $.ajax({
            url: '/admin/product/delete-option?option=' + optionId + '&product=' + modelId,
            type: 'POST',
            dataType: 'json',
        })
        .success(function() {
            $('#option-container-'+ optionId).remove();
        })
        .error(function() {
            alert('Не удалось удалить опцию');
        })
    };
    return App.Product;
})(App || (window.App = {}))

var Product = new App.Product;