<script type="text/javascript">
    $(function()
    {
        $('#body').redactor({
            minHeight: 300,
            plugins: [
                '{{config('lerova.imperavi.fontsize')}}',
                '{{config('lerova.imperavi.fontcolor')}}',
                '{{config('lerova.imperavi.fontfamily')}}',
                '{{config('lerova.imperavi.inlinestyle')}}',
                '{{config('lerova.imperavi.alignment')}}',
                '{{config('lerova.imperavi.table')}}',
                '{{config('lerova.imperavi.uploadcare')}}',
                '{{config('lerova.imperavi.properties')}}',
                '{{config('lerova.imperavi.clips')}}',
                '{{config('lerova.imperavi.source')}}',
                '{{config('lerova.imperavi.fullscreen')}}',
                '{{config('lerova.imperavi.imagemanager')}}'
            ],
            uploadcare: {
                buttonLabel: 'Image / file',
                buttonIconEnabled: true,
                publicKey: '{{ env('UPLOADCARE_PUBLIC_KEY') }}',
                tabs: 'all',
                imageResizable: true,
                imagePosition: true
            }
        });
    });
</script>