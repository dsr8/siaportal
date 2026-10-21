<script id="tmp-probe">
// TEMPORARY test probe — delete this file and its include after the check.
window.addEventListener('load', function () { setTimeout(function () {
    try {
        var sel = document.getElementById('application_status');
        var f = sel && sel.form;
        if (!f) { document.body.setAttribute('data-probe', 'NOFORM'); return; }
        var fields = [].map.call(f.elements, function (e) { return (e.name || '') + ':' + e.type; });
        var orig = sel.value, perStatus = [];
        [].forEach.call(sel.options, function (o) {
            sel.value = o.value;
            if (window.jQuery) { jQuery(sel).trigger('change'); } else { sel.dispatchEvent(new Event('change')); }
            var sections = [].filter.call(document.querySelectorAll('[id]'), function (el) { return /^\d+$/.test(el.id) && el.offsetParent !== null; }).map(function (el) { return el.id; }).sort();
            var visible = [].filter.call(document.querySelectorAll('input[name], select[name], textarea[name]'), function (el) { return el.type !== 'hidden' && el.offsetParent !== null && el.getClientRects().length; }).map(function (el) { return el.name; }).sort();
            perStatus.push(o.value + '>' + sections.join(',') + '>' + visible.join(','));
        });
        sel.value = orig;
        if (window.jQuery) { jQuery(sel).trigger('change'); }
        function hash(s) { var h = 0; for (var i = 0; i < s.length; i++) { h = (h * 31 + s.charCodeAt(i)) | 0; } return h; }
        var sub = f.querySelector('input[type=submit]');
        document.body.setAttribute('data-probe',
            'fields=' + fields.length + ' fieldSig=' + hash(fields.join('|')) +
            ' statuses=' + sel.options.length + ' visibleSig=' + hash(perStatus.join(';')) +
            ' submitInForm=' + !!sub + ' theme=' + !!document.getElementById('sia-edit-application-theme'));
        document.body.setAttribute('data-probe-detail', perStatus.join(';'));
    } catch (e) { document.body.setAttribute('data-probe', 'ERR ' + e.message); }
}, 400); });
</script>
