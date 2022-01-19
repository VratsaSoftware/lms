<tr>
    <td class="header">
        <a href="{{ route('home') }}">
            @if (config('consts.LOGO') == 'vsc')
                Враца Софтуер Платформа
            @elseif (config('consts.LOGO') == 'digitalmontana')
                Дигитално общество Монтана
            @elseif (config('consts.LOGO') == 'digitalsmoliyan')
                Smolyan IT Academy, Powered by Donatix
            @elseif (config('consts.LOGO') == 'digitalrazgrad')
                Дигитално общество Разград
            @endif
        </a>
    </td>
</tr>
