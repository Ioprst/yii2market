<select class="product-value form-control">
    <option value="">Выбрать значения...</option>
    <?php foreach ($values as $value): ?>
        <option value="<?=$value->id?>"><?=$value->text?></option>
    <?php endforeach ?>
</select>
