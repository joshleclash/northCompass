<?php
/**Pendienta la construccion
 */
class Dialog{
    public static function Message($title=null, $message=null, $autoOpen=true, $caseButons=0,$textButton='OK',$modal=true){
        $dialog='';
        $open = 'autoOpen:'.$autoOpen;
        $idDialog= rand(0, 9999);
        $dialog .= '<div id="'.$idDialog.'" title="'.$title.'">';
        $dialog .= '<p>'.$message.'</p>';
        $dialog .='</div>';
        $butons='';
        switch($caseButons){
            case 0:
                $butons = Dialog::crearDialogButton($textButton);
            break;
        case 1:
                $butons .= self::crearButtons('Confirmar', 'alert("ok");','Cancelar','$(this).dialog("close")');
            break;
        }
        echo $dialog;
        if($modal==false)
            {
            echo '<script>$("#'.$idDialog.'").dialog({'.$open.','.$butons.',width:700, height:500});</script>';
            }
        else
            {
            echo '<script>$("#'.$idDialog.'").dialog({modal:'.$modal.','.$open.','.$butons.'});</script>';
            }
        //echo '<script>$("#'.$idDialog.'").dialog({'.$open.','.$butons.'});</script>';
    }
    private static function crearButtons($buttonText1=null,$action1=null,$buttonText2=null,$action2=null){
        $butons='';
        if(!is_null($buttonText1) && !is_null($action1) && !is_null($buttonText2) && !is_null($action2))
            {
            $butons.='buttons: {';
                     $butons.="'".$buttonText1."':function(){".$action1."},";           
                     $butons.="'".$buttonText2."':function(){".$action2."}";           
                $butons.='}';
                return $butons;
            }
        else if(!is_null($buttonText1) && !is_null($action1))
            {
                $butons.='buttons: {';
                     $butons.="'".$buttonText1."':function(){".$action1."}";           
                $butons.='}';
                return $butons;
            }
    }
    private static function crearDialogButton($textButton=null,$action='close'){
        $button = '';
        $button .= 'buttons:{"'.$textButton.'":function(){$(this).dialog("'.$action.'");}}';
       return  $button;
    }
}
?>
