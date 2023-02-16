<?php

namespace App\Services\Export;

class PdfCommon
{
    const HEADER_TEMPLATE = <<<HTML
    HTML;

    const FOOTER_TEMPLATE = <<<HTML
    <div style="font-size:8px;width: 100%;text-align:center;">Page <span class="pageNumber"></span> of <span class="totalPages"></span></div>
    HTML;
}
