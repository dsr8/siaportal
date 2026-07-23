<!-- ===== Create New Agreement modal (shared partial: dashboard.php, view_prospect.php) ===== -->
<style>
    #caWrap {
        display: none; position: fixed; inset: 0; background: rgba(20,20,43,0.5);
        backdrop-filter: blur(2px); -webkit-backdrop-filter: blur(2px);
        z-index: 9999; overflow-y: auto;
    }
    /* No transform here (even an identity one like scale(1)) — #caBox is select2's
       dropdownParent below, and any non-"none" transform on it becomes the containing block
       for its absolutely-positioned dropdown, which throws off select2's own position math
       and makes the client-search results panel render in the wrong place entirely. */
    #caBox {
        background: #fff; border-radius: 16px; max-width: 480px; width: 94%; margin: 60px auto;
        box-shadow: 0 20px 50px rgba(20,20,43,0.3); font-family: 'Segoe UI', Arial, sans-serif;
        opacity: 0; transition: opacity .18s ease;
    }
    #caWrap.ca-show #caBox { opacity: 1; }

    #caBox .ca-head { padding: 20px 24px; border-bottom: 1px solid #eef0f2; display: flex; justify-content: space-between; align-items: center; }
    #caBox .ca-head-left { display: flex; align-items: center; gap: 12px; }
    #caBox .ca-head-icon {
        width: 38px; height: 38px; border-radius: 10px; background: #fdf1f1; color: #e23b3b;
        display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
    #caBox .ca-head-icon svg { width: 19px; height: 19px; }
    #caBox .ca-head strong { font-size: 16.5px; color: #1f2430; display: block; }
    #caBox .ca-head small { font-size: 12px; color: #9aa0aa; font-weight: 400; }
    #caBox .ca-close {
        width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
        cursor: pointer; color: #9aa0aa; font-size: 20px; line-height: 1; transition: background .15s ease, color .15s ease;
    }
    #caBox .ca-close:hover { background: #f4f4f6; color: #1f2430; }

    #caBox .ca-body { padding: 24px; }
    #caBox .ca-field { margin-bottom: 18px; }
    #caBox .ca-field:last-of-type { margin-bottom: 0; }
    #caBox label {
        font-weight: 700; margin-bottom: 7px; display: flex; align-items: center; gap: 6px;
        font-size: 12.5px; color: #6b7280; text-transform: uppercase; letter-spacing: .02em;
    }
    #caBox label svg { width: 14px; height: 14px; color: #b3b8bf; }
    #caBox select { width: 100%; }

    /* Plain <select> (Application) styled to match the rest of the app's rounded, red-focus inputs. */
    #caBox select#ca_application {
        padding: 10px 12px; border: 1.5px solid #e0e3e8; border-radius: 10px; font-size: 13.5px;
        color: #1f2430; background: #fff; appearance: none; -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%239aa0aa' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat; background-position: right 12px center; background-size: 15px;
        transition: border-color .15s ease, box-shadow .15s ease;
    }
    #caBox select#ca_application:disabled { background-color: #f8f9fb; color: #b3b8bf; cursor: not-allowed; }
    #caBox select#ca_application:not(:disabled):focus { outline: none; border-color: #e23b3b; box-shadow: 0 0 0 3px rgba(226,59,59,0.1); }

    /* select2 (Client search) restyled to match the app's aesthetic instead of its own default blue/square theme. */
    #caBox .select2-container--default .select2-selection--single {
        height: 42px; border: 1.5px solid #e0e3e8; border-radius: 10px; display: flex; align-items: center; padding: 0 12px;
        transition: border-color .15s ease, box-shadow .15s ease;
    }
    #caBox .select2-container--default.select2-container--focus .select2-selection--single,
    #caBox .select2-container--default.select2-container--open .select2-selection--single {
        border-color: #e23b3b; box-shadow: 0 0 0 3px rgba(226,59,59,0.1);
    }
    #caBox .select2-selection__rendered { padding: 0 !important; font-size: 13.5px; color: #1f2430; }
    #caBox .select2-selection__arrow { height: 40px !important; }
    #caBox .select2-dropdown { border-color: #e0e3e8; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 26px rgba(20,20,43,0.12); }
    #caBox .select2-search--dropdown .select2-search__field { border: 1.5px solid #e0e3e8; border-radius: 8px; padding: 6px 10px; }
    #caBox .select2-results__option--highlighted[aria-selected] { background: #e23b3b !important; }

    #ca_app_msg, #ca_submit_msg { min-height: 18px; font-size: 12.5px; margin-top: 8px; display: flex; align-items: center; gap: 6px; }

    #caBox .ca-btns { display: flex; gap: 10px; margin-top: 22px; }
    #caBox .ca-btns button {
        flex: 1; padding: 12px 16px; border: none; border-radius: 10px; cursor: pointer; font-size: 14px; font-weight: 700;
        font-family: inherit; transition: transform .12s ease, box-shadow .15s ease, background .15s ease;
    }
    .ca-btn-submit { background: #e23b3b; color: #fff; box-shadow: 0 4px 12px rgba(226,59,59,0.28); }
    .ca-btn-submit:not(:disabled):hover { background: #c92f2f; transform: translateY(-1px); }
    .ca-btn-submit:disabled { background: #f3b9b9; box-shadow: none; cursor: not-allowed; }
    .ca-btn-cancel { background: #f1f2f4; color: #1f2430; }
    .ca-btn-cancel:hover { background: #e8e9ec; }

    .ca-spinner {
        width: 13px; height: 13px; border: 2px solid rgba(255,255,255,.5); border-top-color: #fff;
        border-radius: 50%; display: inline-block; animation: ca-spin .7s linear infinite; vertical-align: -2px;
    }
    @keyframes ca-spin { to { transform: rotate(360deg); } }
</style>

<div id="caWrap" onclick="caMaybeClose(event)">
    <div id="caBox">
        <div class="ca-head">
            <div class="ca-head-left">
                <div class="ca-head-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5"/><path d="M9 13h6M9 17h6"/></svg>
                </div>
                <div>
                    <strong>Create New Agreement</strong>
                    <small>Pick a client and application to start a draft</small>
                </div>
            </div>
            <span class="ca-close" onclick="caClose()">&times;</span>
        </div>
        <div class="ca-body">
            <form id="caForm" method="post" onsubmit="return false;">
                <div class="ca-field">
                    <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Client</label>
                    <select id="ca_client" style="width:100%;">
                        <option value="">Type name, ID, email or phone to search...</option>
                    </select>
                </div>

                <div class="ca-field">
                    <label><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12h6M9 16h6M9 8h1"/><rect x="4" y="3" width="16" height="18" rx="2"/></svg> Application</label>
                    <select id="ca_application" disabled>
                        <option value="">-- Select a client first --</option>
                    </select>
                    <div id="ca_app_msg"></div>
                </div>

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

    // prospectId/prospectName are optional — pass them (e.g. from a specific prospect's row on
    // Siaportal/view_prospect) to open the modal with that client already picked, skipping
    // straight to loading their applications instead of making the admin search for someone
    // they're already looking at. Called with no arguments (dashboard.php's generic "Create New
    // Agreement" button) it opens blank, exactly as before.
    function caOpen(prospectId, prospectName) {
        document.getElementById('ca_app_msg').innerHTML = '';
        document.getElementById('ca_submit_msg').innerHTML = '';
        document.getElementById('ca_submit').disabled = true;

        if (prospectId) {
            var label = (prospectName || 'Client') + ' (' + prospectId + ')';
            var option = new Option(label, prospectId, true, true);
            $('#ca_client').empty().append(option).trigger('change');
            caLoadApplicationsForClient(prospectId);
        } else {
            $('#ca_client').val(null).trigger('change');
            document.getElementById('ca_application').innerHTML = '<option value="">-- Select a client first --</option>';
            document.getElementById('ca_application').disabled = true;
        }

        var wrap = document.getElementById('caWrap');
        wrap.style.display = 'block';
        document.body.style.overflow = 'hidden';
        // Two rAFs so the browser commits the display:block layout before the fade-in
        // transition starts — toggling the class in the same frame as display would skip it.
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                wrap.classList.add('ca-show');
                if (prospectId) {
                    // Client's already picked — nothing to type, so there's no search box to
                    // focus into. applications_for_client() already grabs focus once it resolves.
                    return;
                }
                // Focus only — NOT select2('open'). Auto-opening the dropdown immediately
                // popped up an empty "Please enter 1 or more characters" results panel before
                // the client had typed anything, which read as a stray/broken second box.
                setTimeout(function () { $('#ca_client').select2('focus'); }, 180);
            });
        });
    }

    // Shared by the select2:select handler (user picks a client by searching) and caOpen()'s
    // pre-fill path (client already known from the calling page) — both need to end up in
    // exactly the same state once a client id is settled on.
    function caLoadApplicationsForClient(clientId) {
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
                document.getElementById('ca_app_msg').innerHTML = '<span style="color:#f5a623;">&#9888;&#65039; This client has no applications yet. Add one in the CRM first.</span>';
                return;
            }
            var html = '<option value="">-- Select an application --</option>';
            results.forEach(function (r) {
                html += '<option value="' + r.id + '">' + r.text + (r.status ? ' (' + r.status + ')' : '') + '</option>';
            });
            appSelect.innerHTML = html;
            appSelect.disabled = false;
            appSelect.focus();
        }, 'json').fail(function () {
            appSelect.innerHTML = '<option value="">-- Error loading applications --</option>';
            document.getElementById('ca_app_msg').innerHTML = '<span style="color:#e74c3c;">&#9888;&#65039; Could not load applications. Please try again.</span>';
        });
    }
    function caClose() {
        var wrap = document.getElementById('caWrap');
        wrap.classList.remove('ca-show');
        document.body.style.overflow = '';
        setTimeout(function () { wrap.style.display = 'none'; }, 180);
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
            caLoadApplicationsForClient(e.params.data.id);
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
        document.getElementById('ca_submit_msg').innerHTML = '<span class="ca-spinner"></span><span style="color:#888;">Creating draft...</span>';
        var form = document.getElementById('caForm');
        form.action = CA_BASE + 'agreement/Agreement/start_from_application/' + appId;
        form.submit();
    }
</script>
