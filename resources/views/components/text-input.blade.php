@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-700 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-600 dark:focus:border-indigo-600 focus:ring-indigo-600 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
