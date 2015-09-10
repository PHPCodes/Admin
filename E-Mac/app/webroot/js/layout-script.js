/*jslint white: true, browser: true, undef: true, nomen: true, eqeqeq: true, plusplus: false, bitwise: true, regexp: true, strict: true, newcap: true, immed: true, maxerr: 14 */
/*global window: false, REDIPS: true */

/* enable strict mode */
"use strict";

var redipsInit,
	setTable,
	shiftMode,
	overflow,
	clonedDIV = false,	// cloned flag set in event.moved
	shiftAnimation,
	shiftAfter,
	toggleConfirm,
	counter = 0;

// redips initialization
redipsInit = function () {
	// reference to the REDIPS.drag library
	var	rd = REDIPS.drag;
	// initialization
	rd.init();
	rd.dropMode = 'shift';
	// set mode option to "shift"
	// lastCell = document.getElementById('lastCell');
	// rd.dropMode = 'shift';
	// set animation loop pause
	rd.animation.pause = 20;
	// enable shift.animation
	rd.shift.animation = true;
	// set TD for overflow elements (initially)
	// rd.shift.overflow = document.getElementById('overflow');
	
	// event handler invoked before DIV element is dropped to the cell
	rd.event.droppedBefore = function (targetCell) {

		// test if target cell is occupied and set reference to the dragged DIV element
		var empty = rd.emptyCell(targetCell, 'test');
		// if target cell is not empty
		if (empty) {
			// open dialog should be wrapped in setTimeout because of
			// removeChild and return false below
			setTimeout(function () {
				$('#dialog').dialog('open');
			}, 50);

			// remove dragged DIV from from DOM (node still exists in memory)
			rd.obj.parentNode.removeChild(rd.obj);
			// this will disable DIV elements in target cell (DIV element will be somehow marked)
			rd.enableDrag(true, targetCell);			
			// return false (deleted DIV will not be returned to source cell)
			return false;
		}
	};
/*	rd.event.cloned = function () {
		// increase counter
		counter++;
		// append to the DIV element name
		rd.obj.innerHTML += counter;
	};	 */
	// in the moment when DIV element is moved, clonedDIV will be set
	rd.event.moved = function (cloned) {
		clonedDIV = cloned;
	};	
	// add counter to cloned element name
	// (after cloned DIV element is dropped to the table)
	rd.event.clonedDropped = function () {
		counter++;
		rd.obj.innerHTML += counter;
	}; 
	
	// define jQuery dialog
	$('#dialog').dialog({
		autoOpen: false,
		resizable: false,
		modal: true,
		width: 400,
		height: 200,
		// define Shift, Switch and Overwrite buttons
		buttons: {
			'Save': function () {
				// empty target cell
				rd.emptyCell(rd.td.target);
				// append previously removed DIV to the target cell
				rd.td.target.appendChild(rd.obj);
				
				var seat = document.getElementById('seat').value;
				var divID = rd.obj.id;

				var pos = rd.getPosition();
				if(pos[1]=='0'&&pos[2]=='0'){
					var x = '25';
					var y = '30';
					var position = '0';
				} else if(pos[1]=='0'&&pos[2]=='1'){
					var x = '26';
					var y = '31';	
					var position = '1';
				} else if(pos[1]=='0'&&pos[2]=='2'){
					var x = '27';
					var y = '32';
					var position = '2';					
				}  else if(pos[1]=='0'&&pos[2]=='3'){
					var x = '27';
					var y = '32';
					var position = '3';					
				} else if(pos[1]=='0'&&pos[2]=='4'){
					var x = '27';
					var y = '32';
					var position = '4';					
				} else if(pos[1]=='1'&&pos[2]=='0'){
					var x = '28';
					var y = '33';		
					var position = '5';						
				} else if(pos[1]=='1'&&pos[2]=='1'){
					var x = '29';
					var y = '34';		
					var position = '6';						
				} else if(pos[1]=='1'&&pos[2]=='2'){
					var x = '30';
					var y = '35';	
					var position = '7';						
				}  else if(pos[1]=='1'&&pos[2]=='3'){
					var x = '30';
					var y = '35';	
					var position = '8';						
				}  else if(pos[1]=='1'&&pos[2]=='4'){
					var x = '30';
					var y = '35';	
					var position = '9';						
				} else if(pos[1]=='2'&&pos[2]=='0'){
					var x = '31';
					var y = '36';	
					var position = '10';						
				} else if(pos[1]=='2'&&pos[2]=='1'){
					var x = '32';
					var y = '37';	
					var position = '11';						
				} else if(pos[1]=='2'&&pos[2]=='2'){
					var x = '33';
					var y = '38';	
					var position = '12';						
				}  else if(pos[1]=='2'&&pos[2]=='3'){
					var x = '33';
					var y = '38';	
					var position = '13';						
				} else if(pos[1]=='2'&&pos[2]=='4'){
					var x = '33';
					var y = '38';	
					var position = '14';						
				} else if(pos[1]=='3'&&pos[2]=='0'){
					var x = '34';
					var y = '39';	
					var position = '15';						
				} else if(pos[1]=='3'&&pos[2]=='1'){
					var x = '35';
					var y = '40';
					var position = '16';						
				} else if(pos[1]=='3'&&pos[2]=='2'){
					var x = '36';
					var y = '41';		
					var position = '17';						
				}else if(pos[1]=='3'&&pos[2]=='3'){
					var x = '36';
					var y = '41';		
					var position = '18';						
				}else if(pos[1]=='3'&&pos[2]=='4'){
					var x = '36';
					var y = '41';		
					var position = '19';						
				} else if(pos[1]=='4'&&pos[2]=='0'){
					var x = '37';
					var y = '42';	
					var position = '20';						
				} else if(pos[1]=='4'&&pos[2]=='1'){
					var x = '38';
					var y = '43';	
					var position = '21';						
				} else if(pos[1]=='4'&&pos[2]=='2'){
					var x = '39';
					var y = '44';	
					var position = '22';						
				} else if(pos[1]=='4'&&pos[2]=='3'){
					var x = '39';
					var y = '44';	
					var position = '23';						
				} else if(pos[1]=='4'&&pos[2]=='4'){
					var x = '39';
					var y = '44';	
					var position = '24';						
				} else if(pos[1]=='5'&&pos[2]=='0'){
					var x = '40';
					var y = '45';	
					var position = '25';						
				} else if(pos[1]=='5'&&pos[2]=='1'){
					var x = '41';
					var y = '46';	
					var position = '26';						
				} else if(pos[1]=='5'&&pos[2]=='2'){
					var x = '42';
					var y = '47';		
					var position = '27';						
				} else if(pos[1]=='5'&&pos[2]=='3'){
					var x = '42';
					var y = '47';		
					var position = '28';						
				} else if(pos[1]=='5'&&pos[2]=='4'){
					var x = '42';
					var y = '47';		
					var position = '29';						
				}
				var innerHiddenDiv = '<input type="hidden" name="t[]" value="'+seat+','+x+','+y+','+position+'">';
				
				$('#table2').append(innerHiddenDiv); //add input box
				//divID.appendChild('text');
				console.log(innerHiddenDiv);
				console.log(rd.obj.id);
				
				//alert('seat is ' + seat);
				
				var pos = rd.getPosition();
			   // display element positions
			   	console.log(pos);
				console.log('pos x ' + pos[1] + 'pos y ' + pos[2]);
				// close dialog
				$(this).dialog('close');
				
				
			},		
			'Cancel': function () {
				// enable elements in target cell (return solid border) in both cases
				rd.enableDrag(true, rd.td.target);
				// switch elements only if current DIV element is not cloned 
				if (!clonedDIV) {
					// relocate target and source cells
					rd.relocate(rd.td.target, rd.td.source);
					// append previously removed DIV to the target cell
					rd.td.target.appendChild(rd.obj);
				}
				// close dialog
				$(this).dialog('close');
			}
		},
		// action when dialog is closed
		close: function (event, ui) {
			// return dragged DIV element to the source cell only if X button is clicked
			// (in this case event.which property exists)
			if (event.which) {
				// enable elements in target cell (return solid border)
				rd.enableDrag(true, rd.td.target);				
				
				// if and DIV element is not cloned then return in to source cell
				if (!clonedDIV) {
					// append previously removed DIV to the target cell
					rd.td.source.appendChild(rd.obj);
				}
			}
		}
	});	
};

// add onload event listener
if (window.addEventListener) {
	window.addEventListener('load', redipsInit, false);
}
else if (window.attachEvent) {
	window.attachEvent('onload', redipsInit);
}
