<?php
/*基底クラス*/ 
class InputType{
  protected $type;
  protected $name;
  protected $value ='' ; //値が無い場合に備える 
  protected $class ='' ;
  protected $id ='' ;
  protected $required ='' ;
  protected $disabled ='' ;
  protected $label ='' ;


  // 値セット
  function set_attr($attr){
    foreach ($attr as $key => $value) {
      //keyには"type"が、valueには"radio"が入ってる
      $this->$key = $value; //クラス変数に代入
    }
  }
  
  // ラベルが後ろにつくタイプ text以外用
  function out_attr(){
      return "<label><input type='$this->type' name='$this->name'
      value='$this->value' class='$this->class' id='$this->id' required='$this->required'>
      $this->label</label>";
  }
}//基底クラス閉じ


//ラジオボタン用のクラス
class InputTypeRadio extends InputType{
  protected $value =[] ; //一応初期化、配列で渡されない場合にエラーになってしまう 
  protected $label =[] ; 

  function out_attr(){
    $html = '';
    foreach($this->value as $key => $value){
    
        $html .= "<label><input type='$this->type' name='$this->name'
        value='$value' class='$this->class' id='$this->id' required='$this->required'>
        {$this->label[$key]}</label>";
      
      }
      return $html;
  }//out_attrの閉じ
}//クラスの閉じ


//チェックボックス用のクラス
class InputTypeCheckbox extends InputType{
  protected $value =[] ; 
  protected $label =[] ; 

  function out_attr(){
    $html = '';
    foreach($this->value as $key => $value){
        $html .= "<label><input type='$this->type' name='$this->name'
        value='$value' class='$this->class' id='$this->id'>
        {$this->label[$key]}</label>";
      }
      return $html;
  }
}


//text用のクラス ラベルが前につくタイプ 
class InputTypeText extends InputType{
  function out_attr(){
    return "<label>$this->label<input type='$this->type' name='$this->name'
    value='$this->value' class='$this->class' id='$this->id' required='$this->required'>
    </label>";
  }
}
