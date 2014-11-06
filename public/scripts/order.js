var Order = function () {

	var handleCatererSelect = function() {

		$("#caterer-details").hide();

		$("select#caterer").change(function() {
			$caterer_id = $(this).val()
			$.ajax({
				type: "GET",
				url: "http://supperbuddy.cpwc.me/index.php/caterer/detail/" + $caterer_id,
				success: function (data)
				{
					$("#caterer-details").show();
					// $("#caterer-id").text(data.id);
					$("#caterer-email").text(data.email);
					$("#caterer-phone").text(data.phone);		
					$("#caterer-address").text(data.address);
					$("#caterer-description").text(data.description);
				}
			});
		});
	}

	var handleFoodSelect = function() {

		//$("#food-details").hide();

		$("select#testasdf").change(function() {
			$food_id = $(this).val()
			$.ajax({
				type: "GET",
				url: "http://supperbuddy.cpwc.me/index.php/food/detail/" + $food_id,
				success: function (data)
				{
					$("#price").val(data.price);	
				}
			});
		});
	}


	var handleSubOrderAdd = function() {
		function restoreRow(oTable, nRow) {
			var aData = oTable.fnGetData(nRow);
			var jqTds = $('>td', nRow);

			for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
				oTable.fnUpdate(aData[i], nRow, i, false);
			}

			oTable.fnDraw();
		}

		function editRow(oTable, nRow) {
			var aData = oTable.fnGetData(nRow);
			var jqTds = $('>td', nRow);

			jqTds[0].innerHTML = '<select id="testasdf" class="form-control input-large select2me" data-placeholder="Select..."><option value=""></option></select>';
			jqTds[1].innerHTML = '<input id="price" type="text" class="form-control input-small" value="' + aData[2] + '" readonly>';
			jqTds[2].innerHTML = '<input id="quantity" type="text" class="form-control input-small" value="' + aData[3] + '">';
			jqTds[3].innerHTML = '<a class="edit" href="">Save</a>';
			jqTds[4].innerHTML = '<a class="cancel" href="">Cancel</a>';
		}

		function saveRow(oTable, nRow) {
			var jqInputs = $('input, select', nRow);
			var food = $("option:selected", jqInputs[1]).text() + "<input type='hidden' name='foods[]' value='" + $("option:selected", jqInputs[1]).val() + "'>";
			var price = jqInputs[2].value + "<input type='hidden' name='prices[]' value='" + jqInputs[2].value + "'>";
			var qty = jqInputs[3].value + "<input type='hidden' name='quantities[]' value='" + jqInputs[3].value + "'>";

			oTable.fnUpdate(food, nRow, 0, false);
			oTable.fnUpdate(price, nRow, 1, false);
			oTable.fnUpdate(qty, nRow, 2, false);
			oTable.fnUpdate('', nRow, 3, false);
			oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 4, false);
			oTable.fnDraw();
		}

		function cancelEditRow(oTable, nRow) {
			var jqInputs = $('input', nRow);
			oTable.fnUpdate(jqInputs[1].value, nRow, 0, false);
			oTable.fnUpdate(jqInputs[2].value, nRow, 1, false);
			oTable.fnUpdate(jqInputs[3].value, nRow, 2, false);
			oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 3, false);
			oTable.fnDraw();
		}

		function populateSelect() {
			$caterer_id = $('#caterer_id').val();
			$.ajax({
				type: "GET",
				url: "http://supperbuddy.cpwc.me/index.php/food/list_caterer/" + $caterer_id,
				success: function (data)
				{
					var sel = $("#testasdf");
					sel.empty();
					$.each(data, function(i, item) {
						sel.append( '<option value="'
							+ item.id
							+ '">'
							+ item.name
							+ '</option>' ); 
					});
				}
			});
			$("#testasdf").select2();
			handleFoodSelect();
		}

		var table = $('#datatable_products');

		var oTable = table.dataTable({
			"paging": false,
			"ordering": false,
			"info": false,
			"bFilter": false,
		});

		var nEditing = null;
		var nNew = false;

		$('#new_item').click(function (e) {
			e.preventDefault();

			if (nNew && nEditing) {
				if (confirm("Previous row not saved. Do you want to save it ?")) {
					saveRow(oTable, nEditing); // save
					$(nEditing).find("td:first").html("Untitled");
					nEditing = null;
					nNew = false;

				} else {
					oTable.fnDeleteRow(nEditing); // cancel
					nEditing = null;
					nNew = false;
					
					return;
				}
			}

			var aiNew = oTable.fnAddData(['', '', '', '', '']);
			var nRow = oTable.fnGetNodes(aiNew[0]);
			editRow(oTable, nRow);
			nEditing = nRow;
			nNew = true;
			populateSelect();
		});

		table.on('click', '.delete', function (e) {
			e.preventDefault();

			if (confirm("Are you sure to delete this row ?") == false) {
				return;
			}

			var nRow = $(this).parents('tr')[0];
			oTable.fnDeleteRow(nRow);
			//alert("Deleted! Do not forget to do some ajax to sync with backend :)");
		});

		table.on('click', '.cancel', function (e) {
			e.preventDefault();

			if (nNew) {
				oTable.fnDeleteRow(nEditing);
				nNew = false;
			} else {
				restoreRow(oTable, nEditing);
				nEditing = null;
			}
		});

		table.on('click', '.edit', function (e) {
			e.preventDefault();

			/* Get the row as a parent of the link that was clicked on */
			var nRow = $(this).parents('tr')[0];

			if (nEditing !== null && nEditing != nRow) {
				/* Currently editing - but not this row - restore the old before continuing to edit mode */
				restoreRow(oTable, nEditing);
				editRow(oTable, nRow);
				nEditing = nRow;
				populateSelect();
			} else if (nEditing == nRow && this.innerHTML == "Save") {
				/* Editing this row and want to save it */
				saveRow(oTable, nEditing);
				nEditing = null;
				//alert("Updated! Do not forget to do some ajax to sync with backend :)");
			} else {
				/* No edit in progress - let's start one */
				editRow(oTable, nRow);
				nEditing = nRow;
				populateSelect();
			}
		});
}

return {
		//main function to initiate the module
		init: function () {

			handleCatererSelect();
			handleFoodSelect();
			handleSubOrderAdd();

		}

	};

}();