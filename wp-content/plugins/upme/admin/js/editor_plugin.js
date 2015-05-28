(
	function(){
	
		tinymce.create(
			"tinymce.plugins.UPMEShortcodes",
			{
				init: function(d,e) {},
				createControl:function(d,e)
				{
				
					if(d=="upme_shortcodes_button"){
					
						d=e.createMenuButton( "upme_shortcodes_button",{
							title:"Insert Shortcode",
							icons:false
							});
							
							var a=this;d.onRenderMenu.add(function(c,b){
							
							
								a.addImmediate(b,"Front-end Registration Form", '[upme_registration]');
								a.addImmediate(b,"Front-end Login Form", '[upme_login]');
								a.addImmediate(b,"Logout Button", '[upme_logout]');
								a.addImmediate(b,"Logout Button with Custom Redirect", '[upme_logout redirect_to="http://url_here"]');
								
								b.addSeparator();
								
								c=b.addMenu({title:"Single Profile"});
										a.addImmediate(c,"Logged in User Profile","[upme]" );
										a.addImmediate(c,"Post Author Profile","[upme id=author]" );
										a.addImmediate(c,"Promote a specific User Profile","[upme id=X]" );
								
								b.addSeparator();
								
								a.addImmediate(b,"Group of Users", '[upme group=user_id1,user_id2,user_id3,etc]');
								a.addImmediate(b,"Show All Users", '[upme group=all]');
								a.addImmediate(b,"Search Profiles Widget", '[upme_search autodetect=off]');
								
								b.addSeparator();
								
								a.addImmediate(b,"Private Content (Login Required)", '[upme_private]Content you want to hide from guests go here[/upme_private]');
								
								b.addSeparator();
								
								a.addImmediate(b,"Hide User Statistics", '[upme show_stats=no]');
								a.addImmediate(b,"Hide User Social Bar", '[upme show_social_bar=no]');
								a.addImmediate(b,"1/2 Width Profile View", '[upme width=2]');
								a.addImmediate(b,"Compact Profile (No extra fields)", '[upme view=compact]');
								a.addImmediate(b,"Customized Profile Fields", '[upme view=position_id1,position_id2,position_id3]');

							});
						return d
					
					} // End IF Statement
					
					return null
				},
		
				addImmediate:function(d,e,a){d.add({title:e,onclick:function(){tinyMCE.activeEditor.execCommand( "mceInsertContent",false,a)}})}
				
			}
		);
		
		tinymce.PluginManager.add( "UPMEShortcodes", tinymce.plugins.UPMEShortcodes);
	}
)();