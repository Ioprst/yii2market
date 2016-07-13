<div class="form-group row option-container">
    <div class="col-sm-5">
        <select name="ProductOption[]" class="product-option form-control">
            <option value="">Выбрать опцию...</option>
            <?php foreach ($options as $option): ?>
                <option value="<?=$option->id?>"><?=$option->name?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="value-container col-sm-5">
    </div>
    <div class="option-actions-container col-sm-2">
        <button class="btn btn-danger remove-option-container" name="remove" type="button">
            <span class="fa fa-remove"></span>
        </button>
    </div>
</div>