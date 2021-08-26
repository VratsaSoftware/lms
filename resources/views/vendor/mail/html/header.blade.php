<tr>
    <td class="header">
        <a href="{{ route('home') }}">
            @if (config('consts.LOGO') == 'vsc')
                Враца Софтуер Платформа
            @elseif (config('consts.LOGO') == 'digitalmontana')
                Дигитално общество Монтана Платформа
            @elseif (config('consts.LOGO') == 'digitalsmoliyan')
                Smolyan IT Academy, Powered by Donatix Платформа
            @endif
        </a>
    </td>
</tr>
