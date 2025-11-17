<?php

    function getPaystack() {
        return 'pk_test_6cfdd86d8b0b4d20925905348b4f7d18b95fa875';
    }

    function getMonnifyApiKey() {
        return 'MK_TEST_W82MW7CVL9';
    }

    function getMonnifyContractCode() {
        return '1684679593';
    }
    function getDiscountedPrice(float $originalPrice, float $discountRate): float
    {
        return $originalPrice - ($originalPrice * ($discountRate / 100));
    }

    function uploadVideo($file, $folder = 'course_videos')
    {
        if ($file) {
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs($folder, $originalName, 'public');
            return basename($path);
        }

        return null;
    }



    function getTechnologies(){
        $courseTechnologies = [
            'Laravel',
            'React',
            'Vue',
            'Node.js',
            'Angular',
            'Django',
            'Flask',
            'Spring Boot',
            'Ruby on Rails',
            'ASP.NET Core',
            'Express.js',
            'Next.js',
            'Nuxt.js',
            'Svelte',
            'Tailwind CSS',
            'Bootstrap',
            'Material UI',
            'jQuery',
            'TypeScript',
            'JavaScript',
            'HTML5',
            'CSS3',
            'SASS',
            'LESS',
            'GraphQL',
            'REST API',
            'Firebase',
            'MongoDB',
            'PostgreSQL',
            'MySQL',
            'SQLite',
            'Redis',
            'Docker',
            'Kubernetes',
            'Git',
            'GitHub',
            'Bitbucket',
            'CI/CD',
            'Jenkins',
            'Terraform',
            'AWS',
            'Azure',
            'Google Cloud',
            'Linux',
            'Bash',
            'Python',
            'Java',
            'C#',
            'PHP',
            'Go',
            'Rust',
            'Swift',
            'Kotlin',
            'Flutter',
            'React Native',
            'Xamarin',
            'Unity',
            'TensorFlow',
            'PyTorch',
            'OpenCV',
            'Power BI',
            'Tableau',
            'Apache Spark',
            'Hadoop',
            'Elasticsearch',
            'Solr',
            'Salesforce',
            'SAP',
            'Oracle',
            'MATLAB',
            'R',
            'Figma',
            'Adobe XD',
            'Canva'
        ];

        asort($courseTechnologies);
        return array_values($courseTechnologies);
    }
    function getIcons(){
        return $iconMap = [
            'pdf' => 'ri-file-pdf-line',
            'doc' => 'ri-file-word-line',
            'docx' => 'ri-file-word-line',
            'xls' => 'ri-file-excel-line',
            'xlsx' => 'ri-file-excel-line',
            'ppt' => 'ri-file-ppt-line',
            'pptx' => 'ri-file-ppt-line',
            'jpg' => 'ri-image-line',
            'jpeg' => 'ri-image-line',
            'png' => 'ri-image-line',
            'zip' => 'ri-file-zip-line',
            'rar' => 'ri-file-zip-line',
            'txt' => 'ri-file-text-line',
            'mp4' => 'ri-video-line',
            'mp3' => 'ri-music-line',
            'default' => 'ri-file-line'
        ];
    }
    function getFileColer(){
        return $extensionColorMap = [
            'pdf' => 'danger',
            'doc' => 'primary',
            'docx' => 'primary',
            'xls' => 'success',
            'xlsx' => 'success',
            'ppt' => 'warning',
            'pptx' => 'warning',
            'jpg' => 'info',
            'jpeg' => 'info',
            'png' => 'info',
            'txt' => 'secondary',
            'default' => 'secondary',
        ];
    }
    function RandomString($length)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil($length / strlen($x)))), 1, $length);
    }

    function getData($table_name, $opt)
    {
        return \DB::table($table_name)->orderBy('created_at', 'desc')->$opt();
    }

    function getRecordData($model, $relationship, $name, $order, $opt)
    {
        return $model::with($relationship)->orderBy($name, $order)->$opt();

    }

    function getDateDiff($dateOne, $dateTwo){
        $time1 = new DateTime($dateOne);
        $time2 = new DateTime($dateTwo);
        $timediff = $time1->diff($time2);
        return $timediff->format('%h hour %i minute %s second');
    }

    function getInformation($table_name, $column_name, $val, $opt)
    {
        return \DB::table($table_name)->where([
            "$column_name" => $val,
        ])->orderBy('created_at', 'desc')->$opt();
    }

    function getIPAddress()
    {
        $ip = Request::ip();
        return $ip;
    }
    function getDeviceType($device_name){
        return is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), $device_name));
    }

    function createLog($activities){
        $data=array(
            'user_id'=> Auth::user()->id,
            "activities"=>$activities, "ip_address"=>getIPAddress(),
            'created_at' =>now(), 'updated_at' => now()
        );
        return \DB::table('logs')->insert($data);
    }

    function createCourseAllocationHistory($allocationSlug, $previousUserSlug, $newUserSlug) {
        $data = [
            'slug' => Str::random(7),
            'allocationSlug' => $allocationSlug,
            'previousUserSlug' => $previousUserSlug,
            'newUserSlug' => $newUserSlug,
            'addedByUserSlug' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now()
        ];
        return \DB::table('course_allocation_histories')->insert($data);
    }


    function getEnvs() {
        return App::environment('local') ? public_path() : base_path();
    }

    function createFileUpload($folderName, $uploadFile, $customName)
    {
        if (!$uploadFile || !$uploadFile->isValid()) {
            throw new \Exception('Invalid or missing file upload.');
        }
        $publicPath = App::environment('local') ? public_path($folderName) : base_path($folderName);
        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0777, true, true);
        }
        $safeName = preg_replace('/[^A-Za-z0-9_-]/', '_', $customName);
        $pngFileName = $safeName . '_' . Str::random(6) . '.png';
        $pngPath = $publicPath . DIRECTORY_SEPARATOR . $pngFileName;
        try {
            $uploadFile->move($publicPath, $pngFileName);
        } catch (\Exception $e) {
            throw new \Exception('File move failed: ' . $e->getMessage());
        }

        return [
            'png' => $pngFileName,
            'folder' => $folderName,
            'pngPath' => $pngPath,
            'png_url' => asset($folderName . '/' . $pngFileName),
        ];
    }

    function getTrainings(){
        $trainingTypes = [
            'Online',
            'Onsite',
            'Hybrid',
            'Virtual Instructor-Led',
            'Self-Paced',
            'Bootcamp',
            'Workshop',
            'Seminar',
            'Webinar',
            'Blended Learning'
        ];
        asort($trainingTypes);
        return array_values($trainingTypes);
    }

?>