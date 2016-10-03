$(document).ready(function () {

    $('#wrapper').on('click', 'label', function () {
        //do nothing - touch device override for radio button labels
    });

    $('#wrapper')
		.on('submit', '#local-locator-form', function (e) {
		    e.preventDefault();
		    getResults('html');
		})
		.on('click', '#more-results-btn', function (e) {
		    e.preventDefault();
		    $(this).hide();
		    getResults('append', $(this).data('next_page'), $(this).data('records'));
		});

    var getResults = function (method, pageNo, perPage) {

        var resource = 'http://webarchive.nationalarchives.gov.uk/20140204164039/http://find-legal-advice.justice.gov.uk/search_to_json.php',
			postcode = $.trim($('#postcode').val()),
			indicator = $('#indicator').show(),
			results = $('#search-results'),
			more = $('#more-results-btn').hide(),
			error = $('#search-error').hide(),
			errorText = 'There was a problem: ',
			category = $('[name="category[]"]').val() + ''; //must be a string for <IE9

        if (method == 'html') {
            results.empty()
        }

        $.ajax({
            dataType: "jsonp",
            url: resource,
            timeout: 10000, // in miliseconds
            data: { q: postcode, page: pageNo, records: perPage, cat: category },
            // crossDomain: true, // only required to force JSONP on same domain
            jsonpCallback: 'callback', // to cache searches
            cache: true,
            error: function (jqXHR, textStatus, errorThrown) {
                if (textStatus == 'timeout') {
                    errorText += 'the search did not respond in the allotted time';
                } else {
                    errorText += errorThrown;
                }
                error.text(errorText).show();
                indicator.hide();
            },
            success: function (data, textStatus, jqXHR) {
                var items = [], item, office, add;

                var tmplURL = '<div class="url">' +
                                '<h3>Website:</h3>' +
                                '<p>' +
                                  '<a href="http://webarchive.nationalarchives.gov.uk/20140204164039/http://legal-aid-checker.justice.gov.uk/#{url}"  rel="external" class="org">#{url}</a>' +
                                '</p>' +
                              '</div>',
					tmplTel = '<div class="tel">' +
							    '<h3>Telephone:</h3>' +
							    '<p>#{tel}</p>' +
							  '</div>',
					tmplOrg = '<div class="contact vcard">' +
						        '<div class="name">' +
                                    '<h2>' +
                                    '#{name}' +
                                    '</h2>' +
                                '</div>' +
                                '<div class="details-container">' +
                                  '<div class="tel-container">' +
						            '#{tel}' +
                                  '</div>' +
                                  '<div class="addr-container">' +
						            '<div class="adr">' +
                                      '<h3>Address:</h3>' +
							          '<p>' +
								        '#{address}' +
							          '</p>' +
						            '</div>' +
                                    '#{url}' +
                                  '</div>' +
                                '</div>' +
					          '</div>';

                // Hide indicator
                indicator.hide();

                if (method == 'html' && !(data.errors)) {
                    $('#results-intro').show().find('span').text(postcode);
                };

                if (data.results) {

                    // Show/hide paging
                    more.data({ next_page: data.paging.next_page, records: data.paging.records, total_results: data.paging.total_results })[data.paging.pages > data.paging.current_page ? 'show' : 'hide']();

                    $.each(data.results, function (i) {

                        office = data.results[i]; // convenience

                        item = tmplOrg;

                        // Add conditional templates
                        if (office.site) { item = item.replace('#{url}', tmplURL) }
                        if (office.tel) { item = item.replace('#{tel}', tmplTel) }

                        item = item.replace(/#{url}/g, office.site);
                        item = item.replace('#{name}', office.nam);
                        item = item.replace('#{tel}', office.tel);

                        // Build the address
                        add = [];
                        if (office.add1) { add.push('<span class="street-address">' + office.add1 + '</span>') }
                        if (office.add2) { add.push('<span class="street-address">' + office.add2 + '</span>') }
                        if (office.add3) { add.push('<span class="street-address">' + office.add3 + '</span>') }
                        if (office.city) { add.push('<span class="locality">' + office.city + '</span>') }
                        if (office.pc) { add.push('<span class="postal-code">' + office.pc + '</span>') }
                        item = item.replace('#{address}', add.join('<br />'));

                        // Remove empty placeholders
                        item = item.replace(/#\{[a-z_]+\}/g, '');

                        items.push(item);
                    });

                    results[method](items.join(''));

                } else {
                    if (data.errors) {
                        error.text(errorText + data.errors[0]).show();
                    } else {
                        error.text(errorText + 'no results found').show();
                    }
                }
            }
        });

    };

});