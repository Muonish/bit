
var i = 2;
$(document).ready(function() {
    $('body').on('click', '#addIngredientField', function(e) {
    	$('#ingredients').append('<tr> \
     		<td><input style="position: static; left: 0; width:100px" type="text" name="ingredient[]" /></td> \
          	<td><input style="position: static; left: 0;width:60px" type="text" name="number[]" /></td> \
          	<td>'+ $("#types").clone().prop("outerHTML") +'</td> \
      	</tr>');
      	e.preventDefault();
    });
    
    $('body').on('click', '#addStepField', function(e) {
    	$('#steps').append('<tr><td style="vertical-align: top">' + i++ 
    	+ '. <textarea name="steps[]" cols="40" rows="3"></textarea></td></tr>');
      e.preventDefault();
    });

 });
