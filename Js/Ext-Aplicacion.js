Ext.BLANK_IMAGE_URL = 'ExtJs/resources/images/default/s.gif';
Ext.form.Field.prototype.msgTarget = 'side';
Docs = {};
// create namespace
Ext.namespace('SITI');

// create application
SITI.app = function() {

	// private variables
	var loading = null;
	var mask = null;

	function Alerta(){
		Ext.MessageBox.alert('Alerta', 'Funcion ok!');
	};

ApiPanel = function() {
    ApiPanel.superclass.constructor.call(this, {
//		new Ext.tree.TreePanel({
                        id:'im-tree',
                        title: 'Men&uacute; NorthCompas',
						border: false,
						iconCls: 'Menu',
						margins:'5 5 5 5',
						cmargins:'5 5 5 5',						
                        loader: new Ext.tree.TreeLoader({
					            dataUrl:'Listar_menu.php'
        				}),
                        rootVisible:false,
                        lines:true,
                        autoScroll:true,
                        tools:[{
                            id:'refresh',
                            on:{
                                click: function(){
                                    var tree = Ext.getCmp('im-tree');
                                    tree.body.mask('Cargando..', 'x-mask-loading');
                                    tree.root.reload();
                                    tree.root.collapse(true, false);
                                    setTimeout(function(){ // mimic a server call
                                        tree.body.unmask();
                                        tree.root.expand(true, true);
                                    }, 1000);
                                }
                            }
                        }],
                        root: new Ext.tree.AsyncTreeNode({
                            text: 'Empresa',
							iconCls: 'Edificio',
							draggable:true,
							id:'source'
            })
    })
	
	this.getSelectionModel().on('beforeselect', function(sm, node){
        return node.isLeaf();
    });

};

Ext.extend(ApiPanel, Ext.tree.TreePanel, {
    onClick: function(cls){
		alert(cls);
        if(cls){
            var parts = cls.split('.');
            var last = parts.length-1;
            for(var i = 0; i < last; i++){ // things get nasty - static classes can have .
                var p = parts[i];
                var fc = p.charAt(0);
                var staticCls = fc.toUpperCase() == fc;
                if(p == 'Ext' || !staticCls){
                    parts[i] = 'pkg-'+p;
                }else if(staticCls){
                    --last;
                    parts.splice(i, 1);
                }
            }
            parts[last] = cls;

            this.selectPath('/root/apidocs/'+parts.join('/'));
        }
    }
});

ApiPanel1 = function() {
    ApiPanel1.superclass.constructor.call(this, {
                        id:'im-tree-1',
                        title: 'Compras',
						border: false,
						iconCls: 'Compras',
                        loader: new Ext.tree.TreeLoader({
					            dataUrl:'Listar_menu.php?list=2'
        				}),
                        rootVisible:false,
                        lines:false,
                        autoScroll:true,
                        tools:[{
                            id:'refresh',
                            on:{
                                click: function(){
                                    var tree = Ext.getCmp('im-tree-1');
                                    tree.body.mask('Cargando..', 'x-mask-loading');
                                    tree.root.reload();
                                    tree.root.collapse(true, false);
                                    setTimeout(function(){ // mimic a server call
                                        tree.body.unmask();
                                        tree.root.expand(true, true);
                                    }, 1000);
                                }
                            }
                        }],
                        root: new Ext.tree.AsyncTreeNode({
                            text: 'Empresa',
							iconCls: 'Edificio',
							draggable:true,
							id:'source'
            })
    })
	
	this.getSelectionModel().on('beforeselect', function(sm, node){
        return node.isLeaf();
    });

};

Ext.extend(ApiPanel1, Ext.tree.TreePanel, {
    onClick: function(cls){
		alert(cls);
        if(cls){
            var parts = cls.split('.');
            var last = parts.length-1;
            for(var i = 0; i < last; i++){ // things get nasty - static classes can have .
                var p = parts[i];
                var fc = p.charAt(0);
                var staticCls = fc.toUpperCase() == fc;
                if(p == 'Ext' || !staticCls){
                    parts[i] = 'pkg-'+p;
                }else if(staticCls){
                    --last;
                    parts.splice(i, 1);
                }
            }
            parts[last] = cls;

            this.selectPath('/root/apidocs/'+parts.join('/'));
        }
    }
});


MainPanel = function() {
	MainPanel.superclass.constructor.call(this, {
		id:'doc-body',										  
		region:'center',
		minTabWidth: 105,
		tabWidth:105,
		enableTabScroll:true,
		deferredRender: false,
		defaults: {autoScroll:true},
		activeTab:0,
		items:[
		{
			title: 'Inicio',
			closable:false,
			autoScroll:true,
			autoLoad: {url: './Aplicacion/Iframe_Tab.php?URL_Tab=./Aplicacion/welcome.php', scripts: true, scope: this}
		}]
	});
};

Ext.extend(MainPanel, Ext.TabPanel, {

    initEvents : function(){
        MainPanel.superclass.initEvents.call(this);
        this.body.on('click', this.onClick, this);
    },

    onClick: function(e, target){
        if(target = e.getTarget('a:not(.exi)', 3)){
            var cls = Ext.fly(target).getAttributeNS('ext', 'cls');
            e.stopEvent();
            if(cls){
                var member = Ext.fly(target).getAttributeNS('ext', 'member');
                this.loadClass(target.href, cls, member);
            }else if(target.className == 'inner-link'){
                this.getActiveTab().scrollToSection(target.href.split('#')[1]);
            }else{
                window.open(target.href);
            }
        }else if(target = e.getTarget('.micon', 2)){
            e.stopEvent();
            var tr = Ext.fly(target.parentNode);
            if(tr.hasClass('expandable')){
                tr.toggleClass('expanded');
            }
        }
    },

    loadClass : function(href, cls, member, parametros){
        var id = 'docs-' + cls;
        var tab = this.getComponent(id);
        if(tab){
            this.setActiveTab(tab);
        }else{
            var autoLoad = {url: href, params: parametros, scripts: true};
            var p = this.add({
                id: id,
				title: member,
                closable:true,
	            autoScroll:true,
                autoLoad: autoLoad
            });
            this.setActiveTab(p);
        }
    }
});

var api = new ApiPanel();
var api1 = new ApiPanel1();
var mainPanel = new MainPanel();

api.on('click', function(node, e){
         if(node.isLeaf()){
            e.stopEvent();
//			alert(node.attributes.href+'  -  '+node.id+'  -  '+node.attributes.text);
            mainPanel.loadClass(node.attributes.href, node.id, node.attributes.text, node.attributes.parametros);
      }
});

api1.on('click', function(node, e){
         if(node.isLeaf()){
            e.stopEvent();
//			alert(node.attributes.href+'  -  '+node.id+'  -  '+node.attributes.text);
            mainPanel.loadClass(node.attributes.href, node.id, node.attributes.text, node.attributes.parametros);
      }
});

	return {
		init : function() {
			Ext.QuickTips.init();
			loading = Ext.get('loading');
			mask = Ext.get("mask");
			mask.setOpacity('0.8');
			mask.shift( {
				xy : loading.getXY(),	// Aplica el efecto a partir de la posicion de la ventana
				width : loading.getWidth(),	// Aplica el efecto a lo anhco
				height : loading.getHeight(),	// aplica el efecto a lo alto
				remove : true,			// si desaperese el terminar
				duration : '0.8',		// durecion del efecto
				opacity : '0.3',		// opacidad del fondo	
				easing : 'bounceOut',	// tipo de efecto
				callback : function() {
					loading.fadeOut( {
						duration : '0.1',
						remove : true,
						callback : function() {

       Ext.state.Manager.setProvider(new Ext.state.CookieProvider());
        
       var viewport = new Ext.Viewport({
            layout:'border',
            items:[
                new Ext.BoxComponent({ // raw
                    region:'north',
                    el: 'north',
                    height:70,
					collapsible: true
                }),{
                    region:'west',
                    id:'west-panel',
                    title:'Aplicaci&oacute;n',
                    split:true,
                    width: 260,
                    minSize: 200,
                    maxSize: 300,
                    collapsible: true,				
                    margins:'0 0 0 5',
                    layout:'accordion',
                    layoutConfig:{
                        animate:true
                    },
                    items: [api]
                },mainPanel
             ]
        });
        Ext.get("hideit").on('click', function() {
           var w = Ext.getCmp('west-panel');
           w.collapsed ? w.expand() : w.collapse(); 
        });

						}
					});
				}
			});
		}
	};
}();
			
Ext.onReady(SITI.app.init, SITI.app);
