const Chart = require('chart.js');

// Braintree Payments
console.log('Payment Section')

let button = document.getElementById('submit-button');
const clientToken = document.getElementById('clientToken').value;

console.log(clientToken);

// braintree.dropin.create({
//     authorization: clientToken,
//     container: '#dropin-container'
//   }, function (createErr, instance) {
//     button.addEventListener('click', function () {
//       instance.requestPaymentMethod(function (err, payload) {
//         $.get('/dashboard/payment/process', {payload}, function (response) {
//           if (response.success) {
//             alert('Payment successfull!');
//           } else {
//             alert('Payment failed');
//           }
//         }, 'json');
//       });
//     });
// });

// let paymentForm = document.getElementById('payment-form');
// let nonce = document.getElementById('nonce');
// const CLIENT_TOKEN = document.getElementById('clientToken').value;

// console.log(`Debug - Payment Form: ${paymentForm},\nNonce: ${nonce},\nClient Token ${CLIENT_TOKEN}`);

// braintree.dropin.create({
//         authorization: 'CLIENT_AUTHORIZATION',
//         container: '#dropin-container'
//     },
//     function (err, dropinInstance) {
//         if (err) {
//             // Handle any errors that might've occurred when creating Drop-in
//             console.error(err);
//             return;
//         }
//         form.addEventListener('submit', function (event) {
//             event.preventDefault();

//             dropinInstance.requestPaymentMethod(function (err, payload) {
//                 if (err) {
//                     // Handle errors in requesting payment method
//                     return;
//                 }

//                 // Send payload.nonce to your server
//                 nonceInput.value = payload.nonce;
//                 console.log(`Debug - Payment Form: ${paymentForm},\nNonce: ${nonce},\nClient Token ${CLIENT_TOKEN}`);
//                 form.submit();
//             });
//         });
//     }
// );


