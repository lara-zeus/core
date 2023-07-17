import Alpine from 'alpinejs'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/index.js'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/index.js'
import focus from '@alpinejs/focus'
import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css'; // optional for styling
import Tooltip from "@ryangjchandler/alpine-tooltip";
import Collapse from '@alpinejs/collapse'

Alpine.plugin(NotificationsAlpinePlugin)
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(focus)
Alpine.plugin(Tooltip);
Alpine.plugin(Collapse)

window.Alpine = Alpine

Alpine.start()
