<?php
include ("Conexion.php");
session_start();
$nombres=$_SESSION["Nombres"];
$apeliidos=$_SESSION["Apellidos"];
$nombrc=$nombres." ".$apeliidos;
$time=date("d/m/Y");
?>
<html>
</head>
<link rel="stylesheet" type="text/css" href="/../../ExtJS/resources/css/ext-all.css">

<script type="text/javascript" src="/../../ExtJS/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="/../../ExtJS/ext-all.js"></script>
<script type="text/javascript" src="/../../ExtJs/ext-lang-sp.js"></script>
<script type="text/javascript" src="/../../ExtJs/examples/ux/CheckColumn.js"></script>
<!--<script type="text/javascript" src="../../ExtJs/examples/ux/GroupSummary.js"></script> -->
<!-- <script type="text/javascript" src="../../extjs/examples/grid/totals.js"></script>-->
<!-- <link rel="stylesheet" type="text/css" href="../../ExtJs/examples/ux/css/GroupSummary.css" /> -->
<!-- page specific --> 
<script language="javascript">

Ext.onReady(function(){
	var win = new Ext.Window({
                applyTo:'hello-win',
                layout:'fit',
                width:500,
                height:300,
                closeAction:'hide',
                plain: true,

                items: new Ext.TabPanel({
                    applyTo: 'hello-tabs',
                    autoTabs:true,
                    activeTab:0,
                    deferredRender:false,
                    border:false
                }),

                buttons: [{
                    text:'Submit',
                    disabled:true
                },{
                    text: 'Close',
                    handler: function(){
                        win.hide();
                    }
                }]
            });
        
        win.show(this);
    });
	
</script>
</head>
<div id="hello-win">
hola
</div>
	