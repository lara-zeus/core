<script src="{{ config('app.static') }}/vendors/evo-team/common/CopyToClipboard.js?v={{ config('app.version') }}"></script>
<br>
<h4>الرابط الملغم:</h4>
<div class="input-group" style="width: 350px; margin: 0 auto">
    <span class="input-group-label">
        <a title="{{ trans($langPath . '.openInNewTab') }}" href="{{ $url }}" target="_blank">
            <i class="fa fa-chain-broken"></i>
        </a>
    </span>
    <input class="input-group-field ltr" readonly type="text" value="{{ $url }}">
    <div class="input-group-button">
        <button type="button" class="button info small DoCopyToClipboard">
            <i class="fa fa-lg fa-clipboard" aria-hidden="true"></i>
        </button>
    </div>
</div>
<br>
