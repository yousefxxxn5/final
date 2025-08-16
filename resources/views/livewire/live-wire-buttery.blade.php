<div>

    <li class="nav-item dropdown notification_dropdown">

        @if ($buttery_info->change == '1')
            <i class="fas fa-link fa-2x" title="متصل"></i>
        @endif
        @if ($buttery_info->change == '0')
            <i class="fas fa-unlink fa-2x" style="color: #ff0505;" title=" غير متصل بجهاز الحماية "></i>
        @endif
        @if ($buttery_info->charge == '1')
            <i class="fas fa-bolt fa-2x" style="color: #3de145;" title=" المنزل متصل بل كهرباء"></i>
        @endif




        @if ($buttery_info->velue == '0')
            <i class="fas fa-battery-empty fa-2x " title="0%"
                @if ($buttery_info->charge == '0') style="color: #e13d3d;" @endif></i>
        @endif

        @if ($buttery_info->velue == '20')
            <i class="fas fa-battery-empty fa-2x" title="20%"
                @if ($buttery_info->charge == '0') style="color: #e13d3d;" @endif></i>
        @endif
        @if ($buttery_info->velue == '50')
            <i class="fas fa-battery-half fa-2x" title="50%"
                @if ($buttery_info->charge == '0') style="color: #e13d3d;" @endif></i>
        @endif
        @if ($buttery_info->velue == '70')
            <i class="fas fa-battery-three-quarters fa-2x" title="70%"
                @if ($buttery_info->charge == '0') style="color: #e13d3d;" @endif></i>
        @endif
        @if ($buttery_info->velue === '100')
            <i class="fas fa-battery-full fa-2x" title="100%"
                @if ($buttery_info->charge == '0') style="color: #e13d3d;" @endif></i>
        @endif
        <div>{{ $many }}$$</div>

    </li>



</div>
