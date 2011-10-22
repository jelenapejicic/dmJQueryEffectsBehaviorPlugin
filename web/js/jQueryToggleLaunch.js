function initializeJQueryToggleEffect($context) {
    var $settings = $context.find('.dm_widget_inner.behaviorable');
    if ($settings.length == 0) return;
    $settings = $settings.metadata();
    if ($settings.jqtoggle != undefined) {
        $.each($settings.jqtoggle, function(){
            var self = this;
            $(self.toggler).click(function(){
                $(self.target).toggle(self.effect);
            });
            if (self.targetStartHidden) $(self.target).css('display','none');
        });
    };
//    Ovo ti je skelet
//    
//    var $settings = $context.find('.dm_widget_inner.behaviorable');
//    if ($settings.length == 0) return;
//    $settings = $settings.metadata();
//    if ($settings.jqtoggle != undefined) {
//        $.each($settings.jqtoggle, function(){
//            this.neki_parametar_behaviora
//            Ovde radis parsiranje....
//        });
//    };
};


(function($) {
    $('#dm_page div.dm_widget').bind('dmWidgetLaunch', function() {
        initializeJQueryToggleEffect($(this));        
    });
})(jQuery);