<?php

class dmJQueryEffectsToggleForm extends dmBehaviorForm {
    
    protected $effects = array(
        'slide'=>'Slide',
        'blind'=>'Blind',
        'bounce'=>'Bounce'
    );


    public function configure() {
        parent::configure();
        $this->widgetSchema['toggler'] = new sfWidgetFormInputText();
        $this->validatorSchema['toggler'] = new dmValidatorCssIdAndClasses();
        
        $this->widgetSchema['target'] = new sfWidgetFormInputText();
        $this->validatorSchema['target'] = new dmValidatorCssIdAndClasses();
        
        $this->widgetSchema['effect'] = new sfWidgetFormChoice(array(
            'choices'=>$this->effects
        ));
        $this->validatorSchema['effect'] = new sfValidatorChoice(array(
            'choices'=>  array_keys($this->effects)
        ));
        
        $this->widgetSchema['targetStartHidden'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['targetStartHidden'] = new sfValidatorBoolean();
    }
    
    public function render($attributes = array()) {
        $formRenderer = new dmFrontFormRenderer(array(
            new dmFrontFormSection(
                    array(
                        array("name"=>'toggler', "is_big"=>true),
                        array("name"=>'target', "is_big"=>true),
                        'effect',
                        'targetStartHidden' // array("name"=>'targetStartHidden', "is_big"=>false),
                        ),
                    'Settings'
                    )
            ), $this);
        return $formRenderer->render();
    }
    
    public function getStylesheets() {
        return array_merge(
            parent::getStylesheets(),
            dmFrontFormRenderer::getStylesheets()
                //,array('treba mi i ovo.css') dodas u niz koji ti jos fajlovi trebaju
        );
    }
    public function getJavaScripts() {
        return array_merge(
            parent::getJavaScripts(),
            dmFrontFormRenderer::getJavascripts()
        );
    }
}

