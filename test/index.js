var smpp = require('smpp');
var session = smpp.connect({
	url: 'smpp://blsmsgw.com:2775',
	auto_enquire_link_period: 10000
});
session.bind_transceiver({
	system_id: 'actinumtech',
	password: 'A6gr4b7'
}, function(pdu) {
	if (pdu.command_status == 0) {
		// Successfully bound
		session.submit_sm({
			destination_addr: '255682908805',
			short_message: 'Hello! nodejs smpp test'
		}, function(pdu) {
			if (pdu.command_status == 0) {
				// Message successfully sent
				console.log(pdu.message_id);
			}
		});
	}
});