jQuery(document).ready(function () {
	jQuery("#generateVCard").on("click", function () {
		jQuery.ajax({
			url: kube_ajax.ajaxurl,
			type: 'POST',
			data: {
				action: 'generate_vcard',
			},
			success: function(data) {
				// console.log( data.data.vcard );
				vCardFN = data.data.vCardNameFN;
				vCardLN = data.data.vCardNameLN;
				NameAttr = ( vCardLN ) ? vCardFN+ ' ' + vCardLN + '.vcf' : vCardFN + '.vcf'; 

				data = data.data.vcard;
				// Trigger download
				var blob = new Blob([data]);
				var link = document.createElement('a');
				link.href = window.URL.createObjectURL(blob);
				link.download = NameAttr;
				link.click();
			},
			error: function(error) {
				console.error('Error generating vCard:', error);
			}
		});
	});
});