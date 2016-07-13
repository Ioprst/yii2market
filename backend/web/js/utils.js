function reloadPjaxContainer($container)
{
    var optionPjaxReload  = {};
    optionPjaxReload.container = $($container);

    if ($container.length > 0 && typeof $($container).attr('data-url') != undefined) {
        optionPjaxReload.url     = $($container).attr('data-url');
        optionPjaxReload.push    = false;
        optionPjaxReload.replace = false;
    }
    optionPjaxReload.timeout = 6000;

    $.pjax.reload(optionPjaxReload);
}