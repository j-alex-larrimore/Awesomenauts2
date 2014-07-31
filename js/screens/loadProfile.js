/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


game.LoadProfile = me.ScreenObject.extend({
	/**	
	 *  action to perform on state change
	 */
	onResetEvent: function() {
            document.getElementById("state").innerHTML = "2";
            me.game.world.addChild( new me.SpriteObject (0, 0, me.loader.getImage('load')), -10);
           // me.input.bindPointer(me.input.mouse.LEFT, "select");
            console.log("LoadProfile");
            
                me.input.unbindKey(me.input.KEY.P);
                me.input.unbindKey(me.input.KEY.A);
                me.input.unbindKey(me.input.KEY.B);
                me.input.unbindKey(me.input.KEY.Q);
                me.input.unbindKey(me.input.KEY.W);
                me.input.unbindKey(me.input.KEY.E);
                me.input.unbindKey(me.input.KEY.TAB);
            
            document.getElementById("input").style.visibility = "visible";
            document.getElementById("load").style.visibility = "visible";
            
            me.game.world.addChild( new (me.Renderable.extend ({
                        init: function(){
                            this.parent(new me.Vector2d(0, 0), 1, 1);
                            this.font = new me.BitmapFont("32x32_font", 32);
                            this.updateWhenPaused = true;
                            this.alwaysUpdate = true;
                        },

                        draw: function(context){    
                            this.font.draw(context, "ENTER YOUR USERNAME AND PASSWORD", 0, 0);
                        }

                    })));
             

                
            
	},
                
	
	/**	
	 *  action to perform when leaving this screen (state change)
	 */
	onDestroyEvent: function() {
            document.getElementById("input").style.visibility = "hidden";
            document.getElementById("load").style.visibility = "hidden";
		//me.input.unbindPointer(me.input.mouse.LEFT); // TODO
	}
});