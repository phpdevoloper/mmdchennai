<?php include("include/db_connection.php");

	?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php include "include/sourcelink_css.php" ?>

</head>

<body>

    <?php include "include/header.php" ?>

    <?php include "include/sidebar.php" ?>
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Media</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Media</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">

                                <a class="btn btn-primary" href="#" role="button">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                        <!-- <div class="pd-20">
                            <h4 class="text-blue h4">Data Table Simple</h4>
                            <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p>
                        </div> -->
                        <div class="pd-20">
                            <section id="wrapper">
                                <div class="main">
                                    <h1>My documents</h1>
                                    <div class="input-wrap"><input id="searchbar" type="search" placeholder="Search a file..." /><i class="fa fa-search" aria-hidden="true"></i></div>
                                    <div class="left">
                                        <div class="top-droppable folder_media tooltiper tooltiper-up" data-tooltip="0 file" id="folder1"><i class="fa fa-folder" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i>
                                            <p>Folder 1</p>
                                        </div>
                                        <div class="top-droppable folder_media tooltiper tooltiper-up" data-tooltip="0 file" id="folder2"><i class="fa fa-folder" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i>
                                            <p>Folder 2</p>
                                        </div>
                                        <div class="top-droppable folder_media tooltiper tooltiper-up" data-tooltip="0 file" id="folder3"><i class="fa fa-folder" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i>
                                            <p>Folder 3</p>
                                        </div>
                                        <div class="top-droppable folder_media tooltiper tooltiper-up" data-tooltip="0 file" id="folder4"><i class="fa fa-folder" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i>
                                            <p>Folder 4</p>
                                        </div>
                                        <div class="top-droppable folder_media tooltiper tooltiper-up" data-tooltip="0 file" id="folder5"><i class="fa fa-folder" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i>
                                            <p>Folder 5</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="input-select-wrap">
                                        <div class="fileUpload">
                                            <span>+</span>
                                            <p>Add your files</p>
                                        </div>
                                        <input id='fileSelect' multiple name='fileSelect' type='file'>
                                    </div>
                                    <div id='draggableFile'>
                                        <span>Drop your files here<br /><span>You can drop your files here to add them to your documents</span></span>
                                    </div>
                                    <div id='result'></div>
                                </div>

                                <div class="top-droppable folder-content easeout2 closed" id="folder1-content">
                                    <div class="close-folder-content"><i class="fa fa-times" aria-hidden="true"></i></div>
                                    <h2><i class="fa fa-folder" aria-hidden="true"></i><span>Folder 1</span></h2>
                                </div>

                                <div class="top-droppable folder-content easeout2 closed" id="folder2-content">
                                    <div class="close-folder-content"><i class="fa fa-times" aria-hidden="true"></i></div>
                                    <h2><i class="fa fa-folder" aria-hidden="true"></i><span>Folder 2</span></h2>
                                </div>

                                <div class="top-droppable folder-content easeout2 closed" id="folder3-content">
                                    <div class="close-folder-content"><i class="fa fa-times" aria-hidden="true"></i></div>
                                    <h2><i class="fa fa-folder" aria-hidden="true"></i><span>Folder 3</span></h2>
                                </div>

                                <div class="top-droppable folder-content easeout2 closed" id="folder4-content">
                                    <div class="close-folder-content"><i class="fa fa-times" aria-hidden="true"></i></div>
                                    <h2><i class="fa fa-folder" aria-hidden="true"></i><span>Folder 4</span></h2>
                                </div>

                                <div class="top-droppable folder-content easeout2 closed" id="folder5-content">
                                    <div class="close-folder-content"><i class="fa fa-times" aria-hidden="true"></i></div>
                                    <h2><i class="fa fa-folder" aria-hidden="true"></i><span>Folder 5</span></h2>
                                </div>
                            </section>


                        </div>
                    </div>
                    <!-- Simple Datatable End -->
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <?php include "include/sourcelink_js.php" ?>
    <script type="text/javascript">
        var ui = $(".ui"),
            sidebar = $(".ui__sidebar"),
            main = $(".ui__main"),
            uploadDrop = $(".upload-drop");

        // SIDEBAR TOGGLE
        $(".sidebar-toggle").on("click", function(e) {
            e.preventDefault();
            ui.toggleClass("ui__sidebar--open");
        });

        // MODAL
        $("[data-modal]").on("click", function(e) {
            e.preventDefault();
            var target = $(this).data("modal");
            openModal(target);
        });

        function openModal(id) {
            $("#" + id).toggleClass("info-modal--active");
            $('[data-modal="' + id + '"]').toggleClass("ui__btn--active");
        }

        // OVERLAY
        $("[data-overlay]").on("click", function(e) {
            e.preventDefault();
            var target = $(this).data("overlay");
            openOverlay(target);
        });

        // Close Overlay on Overlay Background Click
        $(".overlay").on("click", function(e) {
            if (e.target !== e.currentTarget) return;
            closeOverlay();
        });

        $(".overlay__close").on("click", function(e) {
            closeOverlay();
        });

        function openOverlay(id) {
            $("#" + id + ".overlay").addClass("overlay--active");
        }

        function closeOverlay() {
            $(".overlay--active").removeClass("overlay--active");
        }

        // File Tree
        $(".folder").on("click", function(e) {
            var t = $(this);
            var tree = t.closest(".file-tree__item");

            if (t.hasClass("folder--open")) {
                t.removeClass("folder--open");
                tree.removeClass("file-tree__item--open");
            } else {
                t.addClass("folder--open");
                tree.addClass("file-tree__item--open");
            }

            // Close all siblings
            tree
                .siblings()
                .removeClass("file-tree__item--open")
                .find(".folder--open")
                .removeClass("folder--open");
        });

        // DRAG & DROP
        var dc = 0;
        uploadDrop
            .on("dragover", function(e) {
                dc = 0;
                drag($(this), e);
            })
            .on("dragenter", function(e) {
                drag($(this), e);
                dc++;
            })
            .on("dragleave", function(e) {
                dragend($(this), e);
                dc--;
            })
            .on("drop", function(e) {
                drop($(this), e);
            });

        function drag(that, e) {
            e.preventDefault();
            e.stopPropagation();
            that.addClass("upload-drop--dragover");
        }

        function dragend(that, e) {
            e.preventDefault();
            e.stopPropagation();
            if (dc === 0) {
                $(".upload-drop--dragover").removeClass("upload-drop--dragover");
            }
        }

        function drop(that, e) {
            dc = 0;
            dragend($(this), e);
            // Handle file
            alert("It seems you dropped something!");
        }

        // SORTING
        function sortTable(n, method) {
            var table,
                rows,
                switching,
                i,
                x,
                y,
                shouldSwitch,
                dir,
                switchcount = 0;
            table = document.getElementById("file-table");
            switching = true;
            dir = "asc";

            while (switching) {
                switching = false;
                rows = table.getElementsByTagName("tr");

                for (i = 1; i < rows.length - 1; i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[n];
                    y = rows[i + 1].getElementsByTagName("td")[n];

                    if (method == "123") {
                        if (dir == "asc") {
                            if (parseFloat(x.innerHTML) > parseFloat(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (parseFloat(x.innerHTML) < parseFloat(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    } else {
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

        var fileSelect = document.getElementById("fileSelect"),
            draggableFile = document.getElementById("draggableFile"),
            result = document.getElementById("result"),
            wrapper = document.getElementById("wrapper");
        xhr = new XMLHttpRequest();
        if (window.File && window.FileList && window.FileReader) {
            function setupReader(file, handler) {
                var reader = new FileReader();
                reader.onloadend = handler;
                reader.readAsDataURL(file);
            }

            function overFile(e) {
                e.stopPropagation();
                e.preventDefault();
                wrapper.className = "visible";
            }

            function endFile(e) {
                e.stopPropagation();
                e.preventDefault();
                wrapper.className = "";
            }

            function dropFile(e) {
                e.stopPropagation();
                e.preventDefault();
                var files = e.target.files || e.dataTransfer.files;
                for (var i = 0; i < files.length; i++) {
                    var eachFile = files[i],
                        type = eachFile.type == "" || eachFile.type == null ?
                        eachFile.name.split(".")[1] :
                        eachFile.type;
                    setupReader(eachFile, function(e) {
                        $("#result").append('<div class="item"><i class="fa fa-file-o" aria-hidden="true"></i><p>' + eachFile.name + '</p></div>');
                    });
                }
                result.style.display = "block";
                wrapper.className = "";
                $(".input-select-wrap").css({
                    bottom: "30px",
                    top: "inherit",
                    transform: "none"
                });

                setTimeout(function() {
                    $(".item").draggable({
                        revert: true,
                        start: function() {
                            $(".folder").css({
                                "background-color": "rgba(0,0,0,0.05)"
                            });
                            $(this).css({
                                display: "inline-block"
                            });
                        },
                        stop: function() {
                            $(".folder").css({
                                "background-color": "rgba(0,0,0,0)"
                            });
                            $(this).css({
                                display: "block"
                            });
                        },
                        drag: function(event, ui) {
                            $(this).css("z-index", "999");
                        }
                    });
                }, 300);
            }

            if (xhr.upload) {
                wrapper.addEventListener("dragover", overFile);
                wrapper.addEventListener("dragenter", overFile);
                draggableFile.addEventListener("dragleave", endFile);
                draggableFile.addEventListener("drop", dropFile);
                fileSelect.addEventListener("change", dropFile);
            }
        }

        $(document).ready(function() {
            var targetFolder;
            var folderID;
            var zIndex;

            $(".folder").droppable({
                accept: ".item, .file",
                over: function(event, ui) {
                    $(this).find("i.fa-file").css({
                        transform: "scale(1.1)",
                        opacity: "0.5"
                    });
                    $(this).find("p").css({
                        opacity: "0.5"
                    });
                    $(this).css({
                        background: "rgba(0,0,0,0.0)",
                        border: "1px solid rgba(0,0,0,0.1)"
                    });
                    targetFolder = $(".ui-droppable-hover").attr("id") + "-content";
                    folderID = $(".ui-droppable-hover").attr("id");
                },
                out: function(event, ui) {
                    $(this).find("i.fa-file").css({
                        transform: "scale(1)",
                        opacity: "1"
                    });
                    $(this).find("p").css({
                        opacity: "1"
                    });
                    $(this).css({
                        background: "rgba(0,0,0,0.05)",
                        border: "1px solid rgba(0,0,0,0)"
                    });
                },
                drop: function() {
                    dropItemToFolder(targetFolder, folderID);
                    updateFilesNumbers();
                }
            });

            $(".left").sortable({
                revert: true
            });

            $(".folder-content").droppable({
                drop: function() {
                    var eLtarget = $(this).attr("id");
                    var eLFolder = $(this).attr("id").slice(0, -8);
                    if (!$(".ui-draggable-dragging").hasClass(eLtarget + "-item")) {
                        dropItemToFolder(eLtarget, eLFolder);
                        updateFilesNumbers();
                    }
                }
            });
            var eLfolderindex;
            var draggieWindow = $(".folder-content").draggabilly();
            draggieWindow.on("dragStart", function(event, pointer) {
                (zIndex = $(".folder-content")
                    .map(function() {
                        return $(this).css("z-index");
                    })
                    .get()), (currentzIndex = Math.max.apply(null, zIndex));
                $(this).css({
                    display: "block",
                    "z-index": currentzIndex + 1
                });
            });
            $(".folder-content").resizable({
                minWidth: 250,
                minHeight: 150,
                start: function(event, ui) {
                    $(".folder-content").draggabilly("disable");
                },
                stop: function(event, ui) {
                    $(".folder-content").draggabilly("enable");
                }
            });
            /*  $(".top-droppable").topDroppable({
            	    drop: function (e, ui) {
            	       console.log("dropped into " + $(this).attr('id'));
            	    }
            	});
            */

            $(".close-folder-content").click(function() {
                var eLfolder = $(this).parent();
                eLfolder.addClass("easeout2").addClass("closed");
                setTimeout(function() {
                    eLfolder.css("display", "none");
                }, 300);
            });

            $(".folder").dblclick(function() {
                (zIndex = $(".folder-content")
                    .map(function() {
                        return $(this).css("z-index");
                    })
                    .get()), (currentzIndex = Math.max.apply(null, zIndex));

                var eLfolder = $(this).attr("id");

                $("#" + eLfolder + "-content").css({
                    display: "block",
                    "z-index": currentzIndex + 1
                });
                setTimeout(function() {
                    $("#" + eLfolder + "-content").addClass("easeout2").removeClass("closed");
                }, 5);
                setTimeout(function() {
                    $("#" + eLfolder + "-content").removeClass("easeout2");
                }, 300);
            });

            toolTiper();
        });

        function toolTiper() {
            $(".tooltiper").each(function() {
                var eLcontent = $(this).attr("data-tooltip"),
                    eLtop = $(this).position().top,
                    eLleft = $(this).position().left;
                $(this).append('<span class="tooltip">' + eLcontent + "</span>");
            });
        }

        function dragTheFiles() {
            setTimeout(function() {
                $(".file").draggable({
                    revert: true,
                    start: function() {
                        $(".folder-content").draggabilly("disable");
                        $(".folder").css({
                            "background-color": "rgba(0,0,0,0.05)"
                        });
                        $(this).css({
                            "background-color": "rgba(0,0,0,0.02)"
                        });
                    },
                    stop: function() {
                        $(".folder-content").draggabilly("enable");
                        $(".folder").css({
                            "background-color": "rgba(0,0,0,0)"
                        });
                        $(this).css({
                            "background-color": "rgba(0,0,0,0.0)"
                        });
                    },
                    drag: function(event, ui) {
                        $(this).css({
                            "z-index": "999"
                        });
                    }
                });
            }, 300);
        }

        function dropItemToFolder(target, folderid) {
            $(".ui-draggable-dragging").draggable({
                revert: false
            });
            $(".ui-draggable-dragging").addClass("is-dropped");
            $("#" + folderid).addClass("item-dropped");
            $(".folder").css({
                background: "rgba(0,0,0,0.05)",
                border: "1px solid rgba(0,0,0,0)"
            });
            $(".folder .fa-folder").css({
                transform: "scale(1)",
                opacity: "1"
            });
            $(".folder p").css({
                opacity: "1"
            });
            setTimeout(function() {
                $(".is-dropped").appendTo("#" + target);
                $(".is-dropped").removeClass().addClass(target + "-item").addClass("file");
                $("." + target + "-item").draggable("destroy");
                $("." + target + "-item").css({
                    left: "0",
                    top: "0"
                });
            }, 300);
            setTimeout(function() {
                $("#" + folderid).removeClass("item-dropped");
            }, 1000);
            dragTheFiles();
        }


        function updateFilesNumbers() {
            setTimeout(function() {
                $('.folder-content').each(function() {
                    var eLFolder = $(this).attr("id").slice(0, -8);
                    var filesCount = $(this).find('.file').length;
                    $('#' + eLFolder).find('.tooltip').html(filesCount + ' file(s)');
                });
            }, 300);
        }
    </script>
</body>

</html>