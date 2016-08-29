jQuery( document ).ready(function() {
	// Set onchange handler for both fields
	jQuery("form.coding-test-ts-sum-form input.form-text").change(validateNumField);
	// Add a message div to page
	var form = jQuery("form.coding-test-ts-sum-form");
	var messageDiv = jQuery("<div>", {id: "sumFormMessDiv"});
	form.append(messageDiv);
});

// Validate input values client-side onchange
function validateNumField() {
	// Get input element and its value
	var input = jQuery(this);
	var val = jQuery(input).val();
	// Get the message div
	var messDiv = jQuery("#sumFormMessDiv");
	// Define the error message
	var message = "You have a non-numeric input.  Please enter two numbers if you'd like to add them.";
	// If the value in non-numeric, style input and show error
	if (isNaN(parseFloat(val)) || !isFinite(val)) {
		input.addClass("invalid");
		messDiv.removeClass("hint");
		messDiv.html(message);
	}
	// else clear styling and error message
	else {
		input.removeClass("invalid");
		// Check if both values are numeric
		var inputs = jQuery("form.coding-test-ts-sum-form input.form-text");
		var error = false;
		var valArray = [];
		jQuery.each(inputs, function(i, input) {
			var val = jQuery(input).val();
			if (isNaN(parseFloat(val)) || !isFinite(val)) {
				error = true;
			}
			else {
				valArray.push(val);
			}
		});
		// If there are two values and no errors
		if (!error && inputs.length ==2) {
			var sum = parseFloat(valArray[0]) + parseFloat(valArray[1]);
			sum = Math.round(sum * 1000) / 1000;
			messDiv.addClass("hint");
			messDiv.html("Psst, the sum's " + sum);			
		}
		// else clear all feedback
		else {
			messDiv.html("");
			messDiv.removeClass("hint");
		}
	}
}