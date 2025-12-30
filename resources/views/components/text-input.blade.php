@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300  hover:bg-red-50  focus:border-gym-500 hover:ring-gym-500 focus:ring-gym-500  rounded-md shadow-sm']) }}>
