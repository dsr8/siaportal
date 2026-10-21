<?php
echo view("admininclude/_tmp_func_probe"); if (isset($_GET["notheme"])) { return; } // TMP-TEST
// Shared look for every category "Edit Application" page (admin/*/edit_*.php).
// CSS only: no block is moved, renamed or hidden, and the existing show/hide-by-status
// JavaScript (.hide / .show classes) keeps working untouched. Scoped to the page content
// (#layoutSidenav_content), so the header and sidebar are not affected.
// Neutral palette: dark navy (same as the sidebar) is the only accent; red is kept for
// validation errors only. Included once per page, just before </head>.
?>
<style id="sia-edit-application-theme">
    :root {
        --sia-ink: #334155;        /* headings */
        --sia-text: #334155;       /* body text */
        --sia-muted: #64748b;      /* labels, hints */
        --sia-line: #e2e8f0;       /* borders */
        --sia-line-soft: #eef2f6;  /* dividers */
        /* Accents come only from the approved palette — no black. */
        --sia-green: #79B63C;  --sia-green-hover: #6aa532;  --sia-green-soft: #f2f8ec;  --sia-green-line: #d3e9bf;
        --sia-amber: #F5B51B;  --sia-amber-soft: #fff6dd;
        --sia-red:   #F15B62;
        --sia-navy: var(--sia-green);          /* former navy accent slots now use green */
        --sia-navy-hover: var(--sia-green-hover);
        --sia-focus: rgba(121, 182, 60, .22);
        --sia-error: var(--sia-red);
    }
    #layoutSidenav_content { background: #f5f7fa; }
    #layoutSidenav_content main { font-family: 'Segoe UI', -apple-system, Arial, sans-serif; color: var(--sia-text); }
    #layoutSidenav_content main > .container-fluid { padding: 20px 24px 32px; }

    /* ── Page title + the old red breadcrumb bar (now a thin divider) ── */
    #layoutSidenav_content main h1.mt-4 {
        margin: 2px 0 6px !important; font-size: 21px; font-weight: 700; letter-spacing: -.01em; line-height: 1.3;
        color: var(--sia-ink) !important;
    }
    #layoutSidenav_content main h1.mt-4::before {
        content: "Application record"; display: block; margin-bottom: 4px;
        font-size: 11px; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; color: var(--sia-muted);
    }
    #layoutSidenav_content main .breadcrumb.mb-4 {
        background: transparent !important; min-height: 0; height: 0; padding: 0; overflow: hidden;
        margin: 0 0 20px !important; border-bottom: 1px solid var(--sia-line); border-radius: 0;
    }

    /* ── Each block becomes a card ── */
    #layoutSidenav_content main .right-side .content {
        background: #fff; border: 1px solid var(--sia-line); border-radius: 12px; margin-bottom: 18px;
        box-shadow: 0 1px 2px rgba(15, 23, 42, .04), 0 4px 16px rgba(15, 23, 42, .04); overflow: hidden;
    }
    #layoutSidenav_content main .right-side .content::after { content: ""; display: table; clear: both; }
    /* Numbered sections (01, 02…). CSS counters skip display:none, so the status sections that
       are hidden never take a number — the visible ones always count 01, 02, 03 in order. */
    #layoutSidenav_content main { counter-reset: sia-section; }
    #layoutSidenav_content main .right-side .content > h2 {
        display: flex; align-items: center; gap: 12px; counter-increment: sia-section;
        margin: 0; padding: 13px 20px; font-size: 14.5px; font-weight: 600; color: var(--sia-ink); line-height: 1.35;
        background: #fff; border-bottom: 1px solid var(--sia-line-soft);
    }
    #layoutSidenav_content main .right-side .content > h2::before {
        content: counter(sia-section, decimal-leading-zero);
        display: inline-flex; align-items: center; justify-content: center; flex: 0 0 28px; height: 28px;
        border-radius: 50%; font-size: 11.5px; font-weight: 700; letter-spacing: 0;
        color: #4d7f22; background: var(--sia-green-soft); border: 1px solid var(--sia-green-line);
    }

    /* Status badge next to the page title (filled in by the script at the bottom). */
    #layoutSidenav_content main .sia-status-pill {
        display: inline-flex; align-items: center; gap: 6px; margin-left: 12px; padding: 4px 12px; vertical-align: 4px;
        font-size: 12px; font-weight: 600; letter-spacing: 0; border-radius: 999px; white-space: nowrap;
        color: #4d7f22; background: var(--sia-green-soft); border: 1px solid var(--sia-green-line);
    }
    #layoutSidenav_content main .sia-status-pill::before { content: ""; width: 7px; height: 7px; border-radius: 50%; background: var(--sia-green); }
    #layoutSidenav_content main .sia-status-pill.is-amber { color: #8a6100; background: var(--sia-amber-soft); border-color: #f8dc93; }
    #layoutSidenav_content main .sia-status-pill.is-amber::before { background: var(--sia-amber); }
    #layoutSidenav_content main .sia-status-pill.is-red { color: #c8323b; background: #fdeced; border-color: #f8c2c5; }
    #layoutSidenav_content main .sia-status-pill.is-red::before { background: var(--sia-red); }

    /* Status card: the dropdown sat in a half column nested inside a half column (25% wide). */
    #layoutSidenav_content main .right-side [class*="col-"]:has(> .form-group #application_status) { width: 100%; max-width: 100%; flex-basis: 100%; }

    /* Profile info → light-green client banner; its read-only boxes read as plain text. */
    #layoutSidenav_content main .right-side .content:has(input[style*="border-top: none"]) {
        background: var(--sia-green-soft); border-color: var(--sia-green-line); border-left: 4px solid var(--sia-green);
    }
    #layoutSidenav_content main .right-side .content:has(input[style*="border-top: none"]) > h2 {
        background: transparent; color: #4d7f22; border-bottom: 1px solid var(--sia-green-line);
        font-size: 11px; letter-spacing: .08em; text-transform: uppercase; padding: 12px 20px 10px;
    }
    #layoutSidenav_content main .right-side .content:has(input[style*="border-top: none"]) > h2 { counter-increment: none; }
    #layoutSidenav_content main .right-side .content:has(input[style*="border-top: none"]) > h2::before { display: none; }
    #layoutSidenav_content main .right-side .content:has(input[style*="border-top: none"]) .table-tabs { padding: 12px 10px 0; }
    #layoutSidenav_content main .right-side .content:has(input[style*="border-top: none"]) .form-group { margin-bottom: 12px; }

    /* Submit block: no empty card around the button — just the action. */
    #layoutSidenav_content main .right-side .content:has(input[type="submit"]):not(:has(.right-side)) { background: transparent; border: 0; box-shadow: none; margin-bottom: 8px; }
    #layoutSidenav_content main .right-side .content:has(input[type="submit"]):not(:has(.right-side)) .table-tabs { padding: 0 10px; }
    #layoutSidenav_content main .right-side .content:has(input[type="submit"]):not(:has(.right-side)) .form-group { margin: 0; }
    #layoutSidenav_content main .right-side .content:has(input[type="submit"]):not(:has(.right-side)) [class*="mb-"] { margin-bottom: 0 !important; }
    /* Broken markup guard (e.g. Tourist Visa Canada): an empty wrapper block whose unclosed <h2>
       swallows the next real block. Make that wrapper invisible so only the inner card shows. */
    #layoutSidenav_content main .right-side .content:has(.right-side) { background: transparent; border: 0; box-shadow: none; overflow: visible; margin-bottom: 0; }
    #layoutSidenav_content main .right-side .content > h2:has(.right-side) { display: block; padding: 0; border: 0; background: none; font-size: inherit; font-weight: inherit; counter-increment: none; }
    #layoutSidenav_content main .right-side .content > h2:has(.right-side)::before { display: none; }

    #layoutSidenav_content main .right-side .table-tabs { padding: 16px 10px 0; display: flow-root; }
    #layoutSidenav_content main .right-side .section-preview { display: flow-root; }

    /* ── Fields ── */
    #layoutSidenav_content main .form-group { margin-bottom: 16px; }
    #layoutSidenav_content main .right-side label {
        display: block; margin: 0 0 6px; padding: 0; font-size: 11px; font-weight: 600; letter-spacing: .05em; text-transform: uppercase;
        color: var(--sia-muted); line-height: 1.35;
    }
    #layoutSidenav_content main .right-side label.error { text-transform: none; letter-spacing: 0; font-size: 12px; }
    #layoutSidenav_content main .form-control {
        height: 40px; padding: 8px 12px; font-size: 14px; color: var(--sia-ink); background-color: #fff;
        border: 1px solid #cbd5e1; border-radius: 8px; box-shadow: none;
        transition: border-color .15s ease, box-shadow .15s ease;
    }
    #layoutSidenav_content main textarea.form-control { height: auto; min-height: 84px; resize: vertical; line-height: 1.5; }
    #layoutSidenav_content main .form-control:hover { border-color: #94a3b8; }
    #layoutSidenav_content main .form-control:focus { border-color: var(--sia-navy); box-shadow: 0 0 0 3px var(--sia-focus); outline: 0; }
    #layoutSidenav_content main .form-control::placeholder { color: #94a3b8; }
    #layoutSidenav_content main .form-control[readonly] { background-color: #fff; cursor: pointer; }
    #layoutSidenav_content main select.form-control {
        -webkit-appearance: none; appearance: none; padding-right: 34px; cursor: pointer;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat; background-position: right 12px center;
    }
    /* Date fields: calendar icon. */
    #layoutSidenav_content main input.form-control.hasDatepicker {
        padding-right: 38px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2379B63C' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Crect x='3' y='4' width='18' height='18' rx='2'/%3E%3Cpath d='M16 2v4M8 2v4M3 10h18'/%3E%3C/svg%3E");
        background-repeat: no-repeat; background-position: right 12px center;
    }
    /* Profile info: display-only boxes (their inline style strips the side borders). */
    #layoutSidenav_content main input.form-control[style*="border-top: none"] {
        height: auto; padding: 0; border: 0 !important; background: transparent; box-shadow: none !important;
        color: #334155; font-size: 15px; font-weight: 600; cursor: default; text-overflow: ellipsis;
    }
    #layoutSidenav_content main input[type="file"] {
        display: block; width: 100%; max-width: 100%; padding: 6px; font-size: 13px; color: var(--sia-muted);
        background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px;
    }
    #layoutSidenav_content main input[type="file"]::file-selector-button,
    #layoutSidenav_content main input[type="file"]::-webkit-file-upload-button {
        margin-right: 10px; padding: 6px 12px; font-size: 12.5px; font-weight: 600; color: var(--sia-ink);
        background: #fff; border: 1px solid #cbd5e1; border-radius: 6px; cursor: pointer;
    }
    #layoutSidenav_content main input[type="radio"], #layoutSidenav_content main input[type="checkbox"] {
        width: 16px; height: 16px; margin: 0 6px 0 0; vertical-align: -3px; accent-color: var(--sia-navy); cursor: pointer;
    }
    #layoutSidenav_content main label.error {
        display: block; margin-top: 6px; padding: 0; font-size: 12px; font-weight: 500;
        color: var(--sia-error); background: none; border: 0;
    }
    #layoutSidenav_content main .form-control.error { border-color: var(--sia-error); }

    /* ── Submit ── */
    #layoutSidenav_content main input[type="submit"].form-control {
        height: 44px !important; padding: 0 !important; font-size: 14.5px; font-weight: 600; letter-spacing: .01em;
        color: #fff !important; background: var(--sia-navy) !important; border: 0; border-radius: 8px; cursor: pointer;
        box-shadow: 0 4px 12px rgba(121, 182, 60, .3); transition: background .15s ease;
    }
    #layoutSidenav_content main input[type="submit"].form-control:hover { background: var(--sia-navy-hover) !important; }

    /* ── Document / voice-note lists ── */
    #layoutSidenav_content main .right-side a { color: #4d7f22; font-weight: 600; text-decoration: underline; text-underline-offset: 2px; text-decoration-color: var(--sia-green-line); }
    #layoutSidenav_content main .right-side a:hover { text-decoration-color: var(--sia-green); }
    #layoutSidenav_content main .right-side .fa-file { color: var(--sia-muted); margin-right: 4px; }

    /* ── Date picker (jQuery UI) ── */
    .ui-datepicker { padding: 8px; font-size: 13px; background: #fff; border: 1px solid var(--sia-line) !important; border-radius: 10px; box-shadow: 0 12px 28px rgba(15, 23, 42, .12); z-index: 1050 !important; }
    .ui-datepicker .ui-datepicker-header { color: var(--sia-ink); background: #f8fafc; border: 0; border-radius: 8px; }
    .ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next { cursor: pointer; }
    .ui-datepicker th { color: var(--sia-muted); font-weight: 600; }
    .ui-datepicker .ui-state-default { text-align: center; background: #fff; border: 0; border-radius: 6px; color: var(--sia-ink); }
    .ui-datepicker .ui-state-hover { background: var(--sia-amber-soft); }
    .ui-datepicker .ui-state-highlight { background: var(--sia-amber); color: #334155; font-weight: 700; }
    .ui-datepicker .ui-state-active { background: var(--sia-navy); color: #fff; font-weight: 600; }

    #layoutSidenav_content footer.bg-light { background: transparent !important; }

    /* ── Alignment + responsive ── */
    #layoutSidenav_content main .container-fluid, #layoutSidenav_content main .right-side { max-width: 100%; }
    /* Cards are nested differently from page to page (some inside a Bootstrap .row, some not, and
       the markup closes </form> inside an open .row, so the browser lifts the blocks after the form
       straight under <main>). Line every card up on the same edge regardless: the column around a
       card gets no side padding, its row no negative margin, and only the page edge sets the gap. */
    #layoutSidenav_content main [class*="col-"]:has(> .right-side) { padding-left: 0; padding-right: 0; }
    /* clear: both — styles.css makes .row a flex box, which refuses to overlap the full-width
       floated block before it and would otherwise shrink to 0px wide (cards vanish on LMIA pages). */
    #layoutSidenav_content main .row:has(> [class*="col-"] > .right-side) { margin-left: 0; margin-right: 0; clear: both; }
    #layoutSidenav_content main > div[class*="col-"]:has(> .right-side) { padding-left: 24px; padding-right: 24px; }
    @media (max-width: 991px) {
        /* Tablets: 4-across fields become 2-across; a half-width field nested in a half-width column goes full width. */
        #layoutSidenav_content main .right-side .col-sm-3 { width: 50%; }
        #layoutSidenav_content main .right-side .col-sm-6 .col-sm-6 { width: 100%; }
    }
    @media (max-width: 767px) {
        #layoutSidenav_content main > .container-fluid { padding: 12px 10px 20px; }
        #layoutSidenav_content main > div[class*="col-"]:has(> .right-side) { padding-left: 10px; padding-right: 10px; }
        #layoutSidenav_content main h1.mt-4 { font-size: 18px; }
        #layoutSidenav_content main .right-side .content > h2 { padding: 12px 14px; font-size: 14.5px; }
        #layoutSidenav_content main .right-side .table-tabs { padding: 12px 2px 0; }
        #layoutSidenav_content main .right-side [class*="col-"] { width: 100%; float: none; }
        #layoutSidenav_content main .row { margin-left: 0; margin-right: 0; }
        /* Fields are nested 3 columns deep; on a phone that padding just squeezes them. */
        #layoutSidenav_content main .right-side .table-tabs [class*="col-"] { padding-left: 6px; padding-right: 6px; }
        #layoutSidenav_content main .form-control { font-size: 16px; } /* stops iOS zoom-on-focus */
    }

    /* ═══ Premium two-column layout (built by the layout script below) ═══════════════════════
       Left: the form, untouched. Right: client card + voice note + documents (display-only
       blocks that hold no form fields). The script undoes itself if anything goes wrong. */
    #layoutSidenav_content main .container-fluid { overflow: visible !important; } /* lets the save bar stick */
    #layoutSidenav_content main .sia-layout { display: grid; grid-template-columns: minmax(0, 1fr) 340px; gap: 22px; align-items: start; }
    #layoutSidenav_content main .sia-layout > .sia-main, #layoutSidenav_content main .sia-layout > .sia-side { min-width: 0; }
    #layoutSidenav_content main .sia-layout .sia-side { position: sticky; top: 76px; display: flex; flex-direction: column; gap: 16px; }
    #layoutSidenav_content main .sia-layout .sia-side > [class*="col-"] { width: 100%; max-width: 100%; float: none; padding: 0 !important; margin: 0; }
    #layoutSidenav_content main .sia-layout .sia-side .right-side .content { margin-bottom: 0; }
    #layoutSidenav_content main .sia-layout .sia-side .right-side [class*="col-"] { width: 100%; max-width: 100%; flex: none; float: none; }
    #layoutSidenav_content main .sia-layout .sia-side .right-side .content > h2 { counter-increment: none; font-size: 13.5px; padding: 12px 18px; }
    #layoutSidenav_content main .sia-layout .sia-side .right-side .content > h2::before {
        content: ""; flex: 0 0 8px; height: 8px; border: 0; background: var(--sia-green);
    }
    #layoutSidenav_content main .sia-layout .sia-side .right-side .table-tabs { padding: 12px 6px 4px; }

    /* Client card (the old Profile info block). */
    #layoutSidenav_content main .sia-layout .sia-side .sia-client {
        background: #fff !important; border: 1px solid var(--sia-line) !important; border-left: 0 !important;
        box-shadow: 0 1px 2px rgba(15, 23, 42, .04), 0 8px 24px rgba(15, 23, 42, .06) !important;
    }
    #layoutSidenav_content main .sia-layout .sia-side .sia-client > h2 { display: none !important; }
    #layoutSidenav_content main .sia-client-head {
        display: flex; align-items: center; gap: 14px; padding: 20px 20px 16px;
        background: linear-gradient(135deg, var(--sia-green-soft), #fff); border-bottom: 1px solid var(--sia-line-soft);
        border-top: 4px solid var(--sia-green);
    }
    #layoutSidenav_content main .sia-client-avatar {
        flex: 0 0 52px; height: 52px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
        font-size: 18px; font-weight: 700; color: #fff; background: var(--sia-green); box-shadow: 0 4px 12px rgba(121, 182, 60, .35);
    }
    #layoutSidenav_content main .sia-client-name { font-size: 16px; font-weight: 700; color: var(--sia-ink); line-height: 1.25; word-break: break-word; }
    #layoutSidenav_content main .sia-client-sub { margin-top: 4px; font-size: 12px; color: var(--sia-muted); }
    #layoutSidenav_content main .sia-client-sub b { color: #4d7f22; font-weight: 700; }
    #layoutSidenav_content main .sia-layout .sia-side .sia-client .table-tabs { padding: 6px 4px 6px; }
    #layoutSidenav_content main .sia-layout .sia-side .sia-client .form-group {
        display: flex; align-items: center; justify-content: space-between; gap: 12px;
        margin: 0 !important; padding: 10px 6px; border-bottom: 1px dashed var(--sia-line);
    }
    #layoutSidenav_content main .sia-layout .sia-side .sia-client [class*="col-"]:last-child .form-group { border-bottom: 0; }
    #layoutSidenav_content main .sia-layout .sia-side .sia-client label { margin: 0 !important; flex: 0 0 auto; }
    #layoutSidenav_content main .sia-layout .sia-side .sia-client input.form-control[style*="border-top: none"] {
        flex: 1 1 auto; min-width: 0; width: auto; text-align: right; color: var(--sia-ink) !important; font-size: 13.5px;
    }
    #layoutSidenav_content main .sia-layout .sia-side .sia-client [class*="col-"] { padding-left: 10px !important; padding-right: 10px !important; }

    /* Sticky save bar (the Submit block, still inside the form). */
    #layoutSidenav_content main .sia-layout .sia-main .right-side:has(input[type="submit"]) { position: sticky; bottom: 14px; z-index: 20; }
    #layoutSidenav_content main .sia-layout .sia-main .right-side .content:has(input[type="submit"]):not(:has(.right-side)) {
        position: relative; background: #fff !important; border: 1px solid var(--sia-green-line) !important;
        box-shadow: 0 -2px 6px rgba(15, 23, 42, .03), 0 10px 30px rgba(15, 23, 42, .10) !important;
        border-radius: 12px; margin-bottom: 18px; padding: 12px 8px;
    }
    #layoutSidenav_content main .sia-layout .sia-main .right-side .content:has(input[type="submit"]):not(:has(.right-side))::before {
        content: "Review the details above, then save the application."; position: absolute; left: 22px; top: 50%;
        transform: translateY(-50%); font-size: 13px; color: var(--sia-muted); pointer-events: none;
    }
    #layoutSidenav_content main .sia-layout .sia-main .right-side .content:has(input[type="submit"]):not(:has(.right-side)) [class*="col-"]:not(:has(input[type="submit"])) { display: none; }
    #layoutSidenav_content main .sia-layout .sia-main .right-side .content:has(input[type="submit"]):not(:has(.right-side)) [class*="col-"]:has(> .form-group > input[type="submit"]) {
        float: right; width: 240px; max-width: 240px; flex: none;
    }
    #layoutSidenav_content main .sia-layout .sia-main .right-side .content:has(input[type="submit"]):not(:has(.right-side)) [class*="col-"]:has(input[type="submit"]) { display: block; }

    /* ── Section colours (tone set by the script below from the heading text) ──
       green = received / approved / normal · amber = status & in-progress · red = refused / withdrawn */
    #layoutSidenav_content main .right-side .content.sia-tone-green { border-top: 3px solid var(--sia-green); }
    #layoutSidenav_content main .right-side .content.sia-tone-amber { border-top: 3px solid var(--sia-amber); }
    #layoutSidenav_content main .right-side .content.sia-tone-red   { border-top: 3px solid var(--sia-red); }
    #layoutSidenav_content main .right-side .content.sia-tone-green > h2 { background: var(--sia-green-soft); border-bottom-color: var(--sia-green-line); }
    #layoutSidenav_content main .right-side .content.sia-tone-amber > h2 { background: var(--sia-amber-soft); border-bottom-color: #f8e3a8; }
    #layoutSidenav_content main .right-side .content.sia-tone-red   > h2 { background: #fdeef0; border-bottom-color: #f8c9cc; }
    #layoutSidenav_content main .right-side .content.sia-tone-green > h2::before { background: var(--sia-green); border-color: var(--sia-green); color: #fff; }
    #layoutSidenav_content main .right-side .content.sia-tone-amber > h2::before { background: var(--sia-amber); border-color: var(--sia-amber); color: #5c4100; }
    #layoutSidenav_content main .right-side .content.sia-tone-red   > h2::before { background: var(--sia-red); border-color: var(--sia-red); color: #fff; }
    #layoutSidenav_content main .sia-layout .sia-side .right-side .content.sia-tone-amber > h2::before { background: var(--sia-amber); }
    #layoutSidenav_content main .sia-layout .sia-side .right-side .content.sia-tone-red > h2::before { background: var(--sia-red); }
    /* Status dropdown picks up the tone of the status card. */
    #layoutSidenav_content main .right-side .content.sia-tone-amber #application_status { border-color: #f3cf6f; }

    /* Sidebar spacing: drop the old per-column margins (mb-3, margin-top…) so the cards stack evenly. */
    #layoutSidenav_content main .sia-layout .sia-side [class*="mb-"] { margin-bottom: 0 !important; }
    #layoutSidenav_content main .sia-layout .sia-side > [class*="col-"] { margin-top: 0 !important; }
    #layoutSidenav_content main .sia-layout .sia-side .right-side .form-group { margin-bottom: 6px; }
    #layoutSidenav_content main .sia-layout .sia-side .sia-client .sia-dup { display: none; }
    #layoutSidenav_content main .sia-layout .sia-side .sia-client input.form-control[style*="border-top: none"] { height: 22px !important; line-height: 22px; }
    #layoutSidenav_content main .sia-layout .sia-side .sia-client .form-group { padding: 9px 6px; }

    @media (max-width: 1199px) {
        #layoutSidenav_content main .sia-layout { grid-template-columns: minmax(0, 1fr); }
        #layoutSidenav_content main .sia-layout .sia-side { position: static; order: -1; }
    }
    @media (max-width: 767px) {
        #layoutSidenav_content main .sia-layout .sia-main .right-side .content:has(input[type="submit"]):not(:has(.right-side))::before { display: none; }
        #layoutSidenav_content main .sia-layout .sia-main .right-side .content:has(input[type="submit"]):not(:has(.right-side)) [class*="col-"]:has(> .form-group > input[type="submit"]) { float: none; width: 100%; max-width: 100%; }
    }
</style>
<script>
    // Status badge next to the page title, mirroring the Status dropdown (display only — the
    // dropdown and its existing show/hide-sections behaviour are untouched).
    document.addEventListener('DOMContentLoaded', function () {
        var title = document.querySelector('#layoutSidenav_content main h1.mt-4');
        var select = document.getElementById('application_status');
        if (!title || !select) { return; }
        var pill = document.createElement('span');
        pill.className = 'sia-status-pill';
        title.appendChild(pill);
        function refresh() {
            var opt = select.options[select.selectedIndex];
            var text = opt ? opt.text.trim() : '';
            pill.textContent = text;
            pill.style.display = text ? '' : 'none';
            pill.classList.toggle('is-red', /refus|withdraw|reject|cancel|declin/i.test(text));
            pill.classList.toggle('is-amber', !/refus|withdraw|reject|cancel|declin/i.test(text) && !/approv|received|complet|issued|granted/i.test(text));
        }
        select.addEventListener('change', refresh);
        refresh();
    });
</script>
<script>
    // Premium layout: puts the form on the left and the display-only blocks (Profile info, Voice
    // Note, Documents) in a right-hand column. Safety rules, so no function can be affected:
    //   - the <form> node is moved as a whole; nothing inside it is touched;
    //   - a block is only moved if it holds no input/select/textarea/button at all;
    //   - every move leaves a placeholder; if the form's field count (form.elements) changes,
    //     every node is put back exactly where it was.
    document.addEventListener('DOMContentLoaded', function () {
        try {
            var main = document.querySelector('#layoutSidenav_content main');
            var container = main && main.querySelector(':scope > .container-fluid');
            var status = document.getElementById('application_status');
            var form = status && status.form;
            if (!container || !form) { return; }

            var fieldCount = form.elements.length;
            var moves = [];
            function move(node, target) {
                var mark = document.createComment('sia-layout-origin');
                node.parentNode.insertBefore(mark, node);
                moves.push([node, mark]);
                target.appendChild(node);
            }
            function undo() {
                moves.reverse().forEach(function (m) { m[1].parentNode.insertBefore(m[0], m[1]); m[1].remove(); });
                if (layout.parentNode) { layout.remove(); }
            }
            function hasControls(el) { return !!el.querySelector('input, select, textarea, button'); }
            // The top-level column wrapping a block (the element directly under main/container/row).
            function blockOf(rightSide) { return rightSide.parentElement; }

            var layout = document.createElement('div');
            layout.className = 'sia-layout';
            var mainCol = document.createElement('div'); mainCol.className = 'sia-main';
            var side = document.createElement('aside'); side.className = 'sia-side';
            layout.appendChild(mainCol); layout.appendChild(side);

            // Side blocks: every card outside the form with no form controls (except the read-only
            // profile boxes, which have no name and are not in the form).
            var profile = null, sideBlocks = [];
            main.querySelectorAll('.right-side').forEach(function (rs) {
                if (form.contains(rs) || rs.parentElement.closest('.right-side')) { return; }
                var isProfile = !!rs.querySelector('input.form-control[style*="border-top: none"]');
                var controls = [].filter.call(rs.querySelectorAll('input, select, textarea, button'), function (c) {
                    return !(isProfile && c.matches('input.form-control[style*="border-top: none"]') && !c.name && !c.form);
                });
                if (controls.length) { return; }
                if (isProfile && !profile) { profile = rs; } else if (!isProfile) { sideBlocks.push(rs); }
            });

            form.parentNode.insertBefore(layout, form);
            move(form, mainCol);
            if (profile) { move(blockOf(profile), side); }
            sideBlocks.forEach(function (rs) { move(blockOf(rs), side); });

            if (form.elements.length !== fieldCount || !form.contains(status)) { undo(); return; }

            // Client card header (initials, name, SiaID) built from the profile values.
            if (profile) {
                var card = profile.querySelector('.content');
                var vals = [].map.call(profile.querySelectorAll('input.form-control'), function (i) { return (i.value || '').trim(); });
                var siaId = vals[0] || '', name = vals[1] || 'Client';
                var initials = name.split(/\s+/).filter(Boolean).slice(0, 2).map(function (w) { return w[0]; }).join('').toUpperCase() || '?';
                card.classList.add('sia-client');
                var head = document.createElement('div');
                head.className = 'sia-client-head';
                head.innerHTML = '<div class="sia-client-avatar"></div><div><div class="sia-client-name"></div><div class="sia-client-sub">SiaID <b></b></div></div>';
                head.querySelector('.sia-client-avatar').textContent = initials;
                head.querySelector('.sia-client-name').textContent = name;
                head.querySelector('.sia-client-sub b').textContent = siaId;
                card.insertBefore(head, card.firstChild);
                // SiaPortal ID and Name are already in the card header — hide those two rows.
                [].slice.call(profile.querySelectorAll('input.form-control'), 0, 2).forEach(function (i) {
                    var col = i.closest('[class*="col-"]');
                    if (col && profile.contains(col)) { col.classList.add('sia-dup'); }
                });
            }
        } catch (e) {
            if (window.console) { console.error('[edit theme layout]', e); }
        }
    });
</script>
<script>
    // Colour tone per card from its heading text (display only).
    document.addEventListener('DOMContentLoaded', function () {
        var red = /refus|withdraw|reject|cancel|declin/i;
        var amber = /edit application|status|process|pending|submit|request|await|adr|interview|medical|biometric|passport|advertis/i;
        document.querySelectorAll('#layoutSidenav_content main .right-side > .content').forEach(function (card) {
            var h = card.querySelector(':scope > h2');
            if (!h || h.querySelector('.right-side') || card.querySelector('input.form-control[style*="border-top: none"]')) { return; }
            var text = h.textContent;
            card.classList.add(red.test(text) ? 'sia-tone-red' : (amber.test(text) ? 'sia-tone-amber' : 'sia-tone-green'));
        });
    });
</script>
