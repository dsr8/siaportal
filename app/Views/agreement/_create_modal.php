<!-- ===== Create New Agreement modal (shared partial: dashboard.php, view_prospect.php) ===== -->
<style>
    #caWrap { display:none; position:fixed; inset:0; background:rgba(20,20,43,0.45); z-index:9999; overflow-y:auto; }
    #caBox { background:#fff; border-radius:14px; max-width:480px; width:94%; margin:60px auto; box-shadow:0 8px 32px rgba(20,20,43,0.25); }
    #caBox .ca-head { padding:18px 22px; border-bottom:1px solid #eef0f2; display:flex; justify-content:space-between; align-items:center; }
    #caBox .ca-head strong { font-size:16px; color:#1f2430; }
    #caBox .ca-head span { cursor:pointer; font-size:22px; line-height:1; color:#9aa0aa; }
    #caBox .ca-body { padding:22px; }
    #caBox label { font-weight:600; margin-bottom:6px; display:block; font-size:13px; color:#1f2430; }
    #caBox select { width:100%; margin-bottom:16px; }
    #ca_app_msg, #ca_submit_msg { min-height:20px; font-size:13px; margin-bottom:10px; }
    #caBox .ca-btns { display:flex; gap:10px; margin-top:6px; }
    #caBox .ca-btns button { flex:1; padding:10px 16px; border:none; border-radius:8px; cursor:pointer; font-size:14px; font-weight:700; }
    .ca-btn-submit { background:#e23b3b; color:#fff; }
    .ca-btn-submit:disabled { background:#f3b9b9; cursor:not-allowed; }
    .ca-btn-cancel { background:#f1f2f4; color:#1f2430; }
</style>

<div id="caWrap" onclick="caMaybeClose(event)">
    <div id="caBox">
        <div class="ca-head">
            <strong>Create New Agreement</strong>
            <span onclick="caClose()">&times;</span>
        </div>
        <div class="ca-body">
            <form id="caForm" method="post" onsubmit="return false;">
                <label>Client</label>
                <select id="ca_client" style="width:100%;">
                    <option value="">Type name, ID, email or phone to search...</option>
                </select>

                <label>Application</label>
                <select id="ca_application" disabled>
                    <option value="">-- Select a client first --</option>
                </select>
                <div id="ca_app_msg"></div>

                <div id="ca_submit_msg"></div>
                <div class="ca-btns">
                    <button type="button" class="ca-btn-submit" id="ca_submit" onclick="caSubmit()" disabled>Start Agreement</button>
                    <button type="button" class="ca-btn-cancel" onclick="caClose()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ===== End Create New Agreement modal ===== -->

<script>
    var CA_BASE = '<?php echo base_url(); ?>/';

    function caOpen() {
        $('#ca_client').val(null).trigger('change');
        document.getElementById('ca_application').innerHTML = '<option value="">-- Select a client first --</option>';
        document.getElementById('ca_application').disabled = true;
        document.getElementById('ca_app_msg').innerHTML = '';
        document.getElementById('ca_submit_msg').innerHTML = '';
        document.getElementById('ca_submit').disabled = true;
        document.getElementById('caWrap').style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    function caClose() {
        document.getElementById('caWrap').style.display = 'none';
        document.body.style.overflow = '';
    }
    function caMaybeClose(e) {
        if (e.target === document.getElementById('caWrap')) caClose();
    }

    $(function () {
        $('#ca_client').select2({
            placeholder: 'Type name, ID, email or phone to search...',
            allowClear: true,
            minimumInputLength: 1,
            dropdownParent: $('#caBox'),
            ajax: {
                url: CA_BASE + 'agreement/Agreement/search_clients',
                dataType: 'json',
                delay: 250,
                data: function (params) { return { q: params.term }; },
                processResults: function (data) { return { results: data.results }; },
                cache: true
            },
            templateResult: function (r) {
                if (r.loading) return r.text;
                if (!r.email && !r.phone) return $('<span>' + r.text + '</span>');
                return $('<div><div>' + r.text + '</div><div style="font-size:12px;color:#9aa0aa;">' +
                    (r.email ? '&#9993; ' + r.email + '&nbsp;&nbsp;' : '') +
                    (r.phone ? '&#128222; ' + r.phone : '') + '</div></div>');
            },
            templateSelection: function (r) { return r.text || r.id; }
        });

        $('#ca_client').on('select2:select', function (e) {
            var clientId = e.params.data.id;
            var appSelect = document.getElementById('ca_application');
            var submitBtn = document.getElementById('ca_submit');
            appSelect.innerHTML = '<option value="">Loading...</option>';
            appSelect.disabled = true;
            submitBtn.disabled = true;
            document.getElementById('ca_app_msg').innerHTML = '';

            $.get(CA_BASE + 'agreement/Agreement/applications_for_client/' + clientId, function (data) {
                var results = data.results || [];
                if (results.length === 0) {
                    appSelect.innerHTML = '<option value="">-- No applications found --</option>';
                    appSelect.disabled = true;
                    document.getElementById('ca_app_msg').innerHTML = '<span style="color:#f5a623;">This client has no applications yet. Add one in the CRM first.</span>';
                    return;
                }
                var html = '<option value="">-- Select an application --</option>';
                results.forEach(function (r) {
                    html += '<option value="' + r.id + '">' + r.text + (r.status ? ' (' + r.status + ')' : '') + '</option>';
                });
                appSelect.innerHTML = html;
                appSelect.disabled = false;
            }, 'json').fail(function () {
                appSelect.innerHTML = '<option value="">-- Error loading applications --</option>';
                document.getElementById('ca_app_msg').innerHTML = '<span style="color:#e74c3c;">Could not load applications. Please try again.</span>';
            });
        });

        $('#ca_client').on('select2:clear', function () {
            document.getElementById('ca_application').innerHTML = '<option value="">-- Select a client first --</option>';
            document.getElementById('ca_application').disabled = true;
            document.getElementById('ca_submit').disabled = true;
        });

        $('#ca_application').on('change', function () {
            document.getElementById('ca_submit').disabled = !this.value;
        });
    });

    function caSubmit() {
        var appId = document.getElementById('ca_application').value;
        if (!appId) return;
        document.getElementById('ca_submit').disabled = true;
        document.getElementById('ca_submit_msg').innerHTML = '<span style="color:#888;">Creating draft...</span>';
        var form = document.getElementById('caForm');
        form.action = CA_BASE + 'agreement/Agreement/start_from_application/' + appId;
        form.submit();
    }
</script>
