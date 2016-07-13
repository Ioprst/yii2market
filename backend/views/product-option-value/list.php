<div id="product-option-container" class="box-group">
    <div class="panel panel-default">
        <a class="panel-heading" aria-controls="collapseLink" aria-expanded="true" href="#collapseOpt" data-parent="#product-option-container" data-toggle="collapse" role="button">
            <h4 class="panel-title"> Значения</h4>
        </a>
        <div class="panel-collapse collapse in" id="collapseOpt">
            <div class="panel-body box-edit">
                <div class="form-group">
                    <button data-option="<?=$model->id?>" class="btn btn-primary btn-sm add-option-value" type="button">Добавить значение</button>
                </div>
                <div class="product-option-container clearfix">
                    <?php
                        foreach ($model->optionValues as $key=>$value) {
                            $optionValue = $model->optionValues[$key];
                            ?>
                            <div id="option-input-container-<?=$optionValue->id?>" class="option-input-container">
                                <input type="hidden" value="<?=$optionValue->id?>" name="OptionValue[<?=$key?>][id]">
                                <input type="text" class="form-control product-option" placeholder="Введите значениe" value="<?=$optionValue->text?>" name="OptionValue[<?=$key?>][text]">
                                <button data-id="<?=$optionValue->id?>" class="btn btn-danger remove-option-value" name="remove" type="button">
                                    <span class="fa fa-remove"></span></button>
                            </div>
                        <?}?>
                </div>
            </div>
        </div>
    </div>
</div>