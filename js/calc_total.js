(function(){
  const ids = ['japanese','math','english','science','social_studies'];
  function calcTotal(){
    let total = 0;
    ids.forEach(id => {
      const el = document.getElementById(id);
      if (!el) return;
      const v = parseInt(el.value, 10);
      if (!isNaN(v)) total += v;
    });
    const out = document.getElementById('total');
    if (out) out.value = total;
  }
  document.addEventListener('DOMContentLoaded', () => {
    ids.forEach(id => {
      const el = document.getElementById(id);
      if (el) el.addEventListener('input', calcTotal);
    });
    calcTotal();
  });
})();