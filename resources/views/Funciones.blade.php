<?php
function hide_patent($patent) {
    return "***" . substr($patent, 3, 3);
}
