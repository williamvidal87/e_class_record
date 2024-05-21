<script>
    document.addEventListener('livewire:init', () => {
        // start for failed
        var failed_data = [];
        var subject_names = [];
        var total_failed = [];
        <?php foreach ($failed_Data as $subject): ?>
            failed_data.push({
                subject_name: "<?php echo $subject['subject_name']; ?>",
                total_failed: <?php echo $subject['total_failed']; ?>
            });
            subject_names.push("<?php echo $subject['subject_name']; ?>");
            total_failed.push(<?php echo $subject['total_failed']; ?>);
        <?php endforeach; ?>
        $(window).on("load", function() {
            var r = $("#bar-chart-failed");
            new Chart(r,{
                type: "horizontalBar",
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: "rgb(0, 255, 0)",
                            borderSkipped: "left"
                        }
                    },
                    responsive: !0,
                    maintainAspectRatio: !1,
                    responsiveAnimationDuration: 500,
                    legend: {
                        position: "top"
                    },
                    scales: {
                        xAxes: [{
                            display: !0,
                            gridLines: {
                                color: "#f3f3f3",
                                drawTicks: !1
                            },
                            scaleLabel: {
                                display: !0
                            }
                        }],
                        yAxes: [{
                            display: !0,
                            gridLines: {
                                color: "#f3f3f3",
                                drawTicks: !1
                            },
                            scaleLabel: {
                                display: !0
                            }
                        }]
                    },
                    title: {
                        display: !1,
                        text: "Chart.js Horizontal Bar Chart"
                    }
                },
                data: {
                    labels: subject_names,
                    datasets: [{
                        label: "Failed Students",
                        data: total_failed,
                        backgroundColor: "#d02828",
                        hoverBackgroundColor: "rgb(255, 0, 0)",
                        borderColor: "transparent"
                    }]
                }
            })
        });
        // end for failed

        
        // start for passed
        var passed_data = [];
        var subject_names_passed = [];
        var total_passed = [];
        <?php foreach ($passed_Data as $subject): ?>
            passed_data.push({
                subject_name: "<?php echo $subject['subject_name']; ?>",
                total_passed: <?php echo $subject['total_passed']; ?>
            });
            subject_names_passed.push("<?php echo $subject['subject_name']; ?>");
            total_passed.push(<?php echo $subject['total_passed']; ?>);
        <?php endforeach; ?>
        $(window).on("load", function() {
            var r = $("#bar-chart-passed");
            new Chart(r,{
                type: "horizontalBar",
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: "rgb(0, 255, 0)",
                            borderSkipped: "left"
                        }
                    },
                    responsive: !0,
                    maintainAspectRatio: !1,
                    responsiveAnimationDuration: 500,
                    legend: {
                        position: "top"
                    },
                    scales: {
                        xAxes: [{
                            display: !0,
                            gridLines: {
                                color: "#f3f3f3",
                                drawTicks: !1
                            },
                            scaleLabel: {
                                display: !0
                            }
                        }],
                        yAxes: [{
                            display: !0,
                            gridLines: {
                                color: "#f3f3f3",
                                drawTicks: !1
                            },
                            scaleLabel: {
                                display: !0
                            }
                        }]
                    },
                    title: {
                        display: !1,
                        text: "Chart.js Horizontal Bar Chart"
                    }
                },
                data: {
                    labels: subject_names_passed,
                    datasets: [{
                        label: "Passed Students",
                        data: total_passed,
                        backgroundColor: "#28D094",
                        hoverBackgroundColor: "rgb(0, 255, 0)",
                        borderColor: "transparent"
                    }]
                }
            })
        });
        // end for passed



        $(window).on("load", function() {
            var a = $("#simple-doughnut-chart");
            new Chart(a,{
                type: "doughnut",
                options: {
                    responsive: !0,
                    maintainAspectRatio: !1,
                    responsiveAnimationDuration: 500
                },
                data: {
                    labels: ["Total Students Failed:", "Total Students Passed"],
                    datasets: [{
                        label: "Class Data",
                        data: [<?php echo $this->overallTotalFailed; ?>, <?php echo $this->overallTotalPassed; ?>],
                        backgroundColor: ["#FF4961","#28D094"]
                    }]
                }
            })
        });

        

        
    });
    
    document.addEventListener('livewire:initialized', () => {


    });
</script>