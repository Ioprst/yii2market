
<select name="ProductOption[values][<?=$optionId?>]" data-product="<?=isset($productId) ? $productId: ''?>" data-option="<?=isset($optionId) ? $optionId: ''?>"class="product-value form-control">
    <option value="">Выбрать значения...</option>
    <?php foreach ($values as $value):
        $selected = isset($selectedId) && $selectedId == $value->id ? 'selected' : ''
    ?>
        <option <?=$selected?> value="<?=$value->id?>"><?=$value->text?></option>
    <?php endforeach ?>
</select>
