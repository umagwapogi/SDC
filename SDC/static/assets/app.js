const service = document.getElementById('service');
if (service) service.addEventListener('change', () => {
  const price = service.options[service.selectedIndex].dataset.price;
  if (price) document.getElementById('amount').value = Number(price).toFixed(2);
});
