<?php

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