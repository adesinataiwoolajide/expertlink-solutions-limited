@if($ratings->count() > 0)
    <h5>Rating Distribution</h5>

    <!-- Chart Type Selector -->
    <div class="mb-3">
        <label for="chartType" class="form-label">Select Chart Type:</label>
        <select id="chartType" class="form-select" style="width:auto; display:inline-block;">
            <option value="bar" selected>Bar</option>
            <option value="line">Line</option>
        </select>
    </div>

    <div id="distributionChartWrapper" class="fade-container">
        <canvas id="ratingsChart" height="120"></canvas>
    </div>
@endif
<style type="stylesheet">
    .fade-container {
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
    }
    .fade-container.hidden {
        opacity: 0;
        pointer-events: none;
        height: 0;
        overflow: hidden;
    }
</style>