require('./_select2');
require('./_tager');

import Alpine from 'alpinejs'
import Trap from '@alpinejs/trap'

Alpine.plugin(Trap)

window.Alpine = Alpine

Alpine.start()