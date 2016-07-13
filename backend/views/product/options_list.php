<div id="product-option-container" class="box-group">
    <div class="panel panel-default">
        <a class="panel-heading" aria-controls="collapseLink" aria-expanded="true" href="#collapseOpt" data-parent="#product-option-container" data-toggle="collapse" role="button">
            <h4 class="panel-title"> Опции</h4>
        </a>
        <div class="panel-collapse collapse in" id="collapseOpt">
            <div class="panel-body box-edit">
                <div class="form-group">
                    <button data-model="<?=$model->id?>" class="btn btn-primary btn-sm add-product-option" type="button">Добавить опцию</button>
                </div>
                <div class="product-option-container clearfix">
                    <?
                    if (!empty($optionValues)) {
                        foreach ($optionValues as $optionValue) {
                                $option = $optionValue['option'];
                                $value = $optionValue['value'];
                            ?>
                            <div id="option-container-<?=$option->id?>" class="form-group row option-container">
                                <div class="col-sm-5">
                                    <div  class="option-label"><?=$option->name?></div>
                                </div>
                                <div class="value-container col-sm-5">
                                    <?
                                        if (!empty($option->optionValues)) {
                                            echo $this->render('//option-value/dropdown', ['values'=>$option->optionValues, 'selectedId'=>$value->id, 'optionId'=>$option->id, 'productId'=>$model->id]);
                                        }
                                    ?>
                                </div>
                                <div class="option-actions-container col-sm-2">
                                    <button data-model="<?=$model->id?>" data-option="<?=$option->id?>" class="btn btn-danger btn-sm remove-option" name="remove" type="button">
                                        <span class="fa fa-remove"></span>
                                    </button>
                                </div>
                            </div>
                        <?}
                    }?>
                </div>
            </div>
        </div>
    </div>
</div>