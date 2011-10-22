<?php

class dmJQueryEffectsToggleView extends dmBehaviorView {
    
    private $loadJS = array();
    
    protected function filterSettings($settings) {
        $settings = parent::filterSettings($settings);
        // Ovde ja pisem
        $settings['targetStartHidden'] = (isset($settings['targetStartHidden'])) ? $settings['targetStartHidden'] : false;
        $this->loadJS[] = 'lib.ui-effects-'.$settings['effect'];
//        if (isset($settings['targetStartHidden']) && $settings['targetStartHidden']) {
//            $settings['targetStartHidden'] = 'true';
//        } else  {
//            $settings['targetStartHidden'] = 'false';
//        }
//        if ($pero) == if ($pero == true) optimizacija
        return $settings;
    }
    
    public function getJavascripts() {
        return array_merge(
            parent::getJavascripts(),            
            array(
                'lib.ui-core',
                'lib.ui-effects-core',
                '/dmJQueryEffectsBehaviorPlugin/js/jQueryToggleLaunch.js'
            ),
            $this->loadJS
        );
    }
    
    public function getStylesheets() {
        return array_merge(
            parent::getStylesheets(),
            array(
                
            )
        );
    }
    
}

