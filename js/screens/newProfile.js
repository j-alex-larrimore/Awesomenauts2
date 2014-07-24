/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


game.NewProfile = me.ScreenObject.extend({
	/**	
	 *  action to perform on state change
	 */
	onResetEvent: function() {	
            me.game.world.addChild( new me.SpriteObject (0, 0, me.loader.getImage('new')), -20);
           // me.input.bindPointer(me.input.mouse.LEFT, "select");
            console.log("NewProfile");
            document.getElementById("input").style.visibility = "visible";
            
            me.input.unbindKey(me.input.KEY.P);
                me.input.unbindKey(me.input.KEY.A);
                me.input.unbindKey(me.input.KEY.B);
                me.input.unbindKey(me.input.KEY.Q);
                me.input.unbindKey(me.input.KEY.W);
                me.input.unbindKey(me.input.KEY.E);
                
      
                
            me.game.world.addChild( new (me.Renderable.extend ({
                        init: function(){
                            this.parent(new me.Vector2d(0, 0), 1, 1);
                            this.font = new me.BitmapFont("32x32_font", 32);
                            this.updateWhenPaused = true;
                            this.alwaysUpdate = true;
                        },

                        draw: function(context){    
                            this.font.draw(context, "PICK A USERNAME AND PASSWORD", 0, 0);
                        }

                    })));
                    
           this.userName = "";
           this.PW = "";
                    
 
                
                me.input.bindKey(me.input.KEY.ENTER, "ENTER", true);
                
                this.handler = me.event.subscribe(me.event.KEYDOWN, function (action, keyCode, edge) {
                    if (action === "ENTER") {
                        this.userName = document.data.Username.value;
                        this.PW = document.data.Password.value;
                        console.log("Enter! + " + this.userName + " " + this.PW);
                    }
                });
	},
                
	
	/**	
	 *  action to perform when leaving this screen (state change)
	 */
	onDestroyEvent: function() {
            document.getElementById("input").style.visibility = "hidden";
            me.input.unbindKey(me.input.KEY.ENTER);
		//me.input.unbindPointer(me.input.mouse.LEFT); // TODO
	}
});