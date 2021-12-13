$(function() {
    /**
     * Created by Zura on 4/5/2016.
     */
     var myTasks = JSON.parse(window.tasks);
     var myarchive = JSON.parse(window.archive);
     var myassign = JSON.parse(window.assign);
    $(function() {
        Lobibox.notify.DEFAULTS = $.extend({}, Lobibox.notify.DEFAULTS, {
            size: 'mini',
            // delay: false,
            position: 'right top'
        });

        //Basic example
        // myTasks.forEach(task => {
        $('#todo-lists-basic-demo').lobiList({
            lists: [{
                    id: 'todo',
                    title: 'Todo',
                    description:'Todo',
                    duedate:'Todo',
                    defaultStyle: 'lobilist-danger',

                    items : myassign
                    // items: [

                    //     {
                    //         id:myTasks[0]['id'],
                    //         title: myTasks[0]['title'],
                    //         description: myTasks[0]['description'],
                    //         duedate: myTasks[0]['duedate']
                    //     },
                    //     {
                    //         title: myTasks[1]['title'],
                    //         description: myTasks[1]['description'],
                    //         duedate: myTasks[1]['duedate'],
                    //         // done: true
                    //     },
                        // {
                        //     title: task.title,
                        //     description: task.description
                        // },
                        // {
                        //     title: task.title,
                        //     description: task.description,
                        //     duedate: task.duedate
                        // }
                    // ]
                },
                {
                    id: 'doing',
                    title: 'Doing',
                    defaultStyle: 'lobilist-primary',
                    items: myTasks
                },
                {
                    id: 'Done',
                    title: 'Done',
                    defaultStyle: 'lobilist-success',
                    items: myarchive

                }
            ]
        });
    // });
        //Custom datepicker
        $('#todo-lists-demo-datepicker').lobiList({
            lists: [{
                title: 'Todo',
                defaultStyle: 'lobilist-info',
                items: [{
                    title: 'Floor cool cinders',
                    description: 'Thunder fulfilled travellers folly, wading, lake.',
                    duedate: '2015-01-31'
                }]
            }],
            afterListAdd: function(lobilist, list) {
                var $duedateInput = list.$el.find('form [name=duedate]');
                $duedateInput.datepicker();
            }
        });
        // Event handling
        (function() {
            var list;

            $('#todo-lists-initialize-btn').click(function() {
                list = $('#todo-lists-demo-events')
                    .lobiList({
                        init: function() {
                            Lobibox.notify('default', {
                                msg: 'init'
                            });
                        },
                        beforeDestroy: function() {
                            Lobibox.notify('default', {
                                msg: 'beforeDestroy'
                            });
                        },
                        afterDestroy: function() {
                            Lobibox.notify('default', {
                                msg: 'afterDestroy'
                            });
                        },
                        beforeListAdd: function() {
                            Lobibox.notify('default', {
                                msg: 'beforeListAdd'
                            });
                        },
                        afterListAdd: function() {
                            Lobibox.notify('default', {
                                msg: 'afterListAdd'
                            });
                        },
                        beforeListRemove: function() {
                            Lobibox.notify('default', {
                                msg: 'beforeListRemove'
                            });
                        },
                        afterListRemove: function() {
                            Lobibox.notify('default', {
                                msg: 'afterListRemove'
                            });
                        },
                        beforeItemAdd: function() {
                            Lobibox.notify('default', {
                                msg: 'beforeItemAdd'
                            });
                        },
                        afterItemAdd: function() {
                            console.log(arguments);
                            Lobibox.notify('default', {
                                msg: 'afterItemAdd'
                            });
                        },
                        beforeItemUpdate: function() {
                            Lobibox.notify('default', {
                                msg: 'beforeItemUpdate'
                            });
                        },
                        afterItemUpdate: function() {
                            console.log(arguments);
                            Lobibox.notify('default', {
                                msg: 'afterItemUpdate'
                            });
                        },
                        beforeItemDelete: function() {
                            Lobibox.notify('default', {
                                msg: 'beforeItemDelete'
                            });
                        },
                        afterItemDelete: function() {
                            Lobibox.notify('default', {
                                msg: 'afterItemDelete'
                            });
                        },
                        beforeListDrop: function() {
                            Lobibox.notify('default', {
                                msg: 'beforeListDrop'
                            });
                        },
                        afterListReorder: function() {
                            Lobibox.notify('default', {
                                msg: 'afterListReorder'
                            });
                        },
                        beforeItemDrop: function() {
                            Lobibox.notify('default', {
                                msg: 'beforeItemDrop'
                            });
                        },
                        afterItemReorder: function() {
                            Lobibox.notify('default', {
                                msg: 'afterItemReorder'
                            });
                        },
                        afterMarkAsDone: function() {
                            Lobibox.notify('default', {
                                msg: 'afterMarkAsDone'
                            });
                        },
                        afterMarkAsUndone: function() {
                            Lobibox.notify('default', {
                                msg: 'afterMarkAsUndone'
                            });
                        },
                        styleChange: function(list, oldStyle, newStyle) {
                            console.log(arguments);
                            Lobibox.notify('default', {
                                msg: 'styleChange: Old style - "' + oldStyle + '". New style - "' + newStyle + '"'
                            });
                        },
                        titleChange: function(list, oldTitle, newTitle) {
                            console.log(arguments);
                            Lobibox.notify('default', {
                                msg: 'titleChange: Old title - "' + oldTitle + '". New title - "' + newTitle + '"'
                            });
                        },
                        lists: [{
                            title: 'Todo',
                            defaultStyle: 'lobilist-info',
                            items: [{
                                    title: 'Floor cool cinders',
                                    description: 'Thunder fulfilled travellers folly, wading, lake.',
                                    duedate: '2015-01-31'
                                },
                                {
                                    title: 'Periods pride',
                                    description: 'Accepted was mollis',
                                    done: true
                                },
                                {
                                    title: 'Flags better burns pigeon',
                                    description: 'Rowed cloven frolic thereby, vivamus pining gown intruding strangers prank ' +
                                        'treacherously darkling.'
                                },
                                {
                                    title: 'Accepted was mollis',
                                    description: 'Rowed cloven frolic thereby, vivamus pining gown intruding strangers prank ' +
                                        'treacherously darkling.',
                                    duedate: '2015-02-02'
                                }
                            ]
                        }]
                    })
                    .data('lobiList');
            });

            $('#todo-lists-destroy-btn').click(function() {
                list.destroy();
            });
        })();
        // Custom controls
        $('#todo-lists-demo-controls').lobiList({
            lists: [{
                    title: 'Todo',
                    defaultStyle: 'lobilist-info',
                    controls: ['edit', 'styleChange'],
                    items: [{
                        title: 'Floor cool cinders',
                        description: 'Thunder fulfilled travellers folly, wading, lake.',
                        duedate: '2015-01-31'
                    }]
                },
                {
                    title: 'Disabled checkboxes',
                    defaultStyle: 'lobilist-danger',
                    controls: ['edit', 'add', 'remove'],
                    useLobicheck: false,
                    items: [{
                        title: 'Periods pride',
                        description: 'Accepted was mollis',
                        done: true
                    }]
                },
                {
                    title: 'Controls disabled',
                    controls: false,
                    items: [{
                        title: 'Composed trays',
                        description: 'Hoary rattle exulting suspendisse elit paradises craft wistful. ' +
                            'Bayonets allures prefer traits wrongs flushed. Tent wily matched bold polite slab coinage ' +
                            'celerities gales beams.'
                    }]
                },
                {
                    title: 'No edit/remove',
                    enableTodoRemove: false,
                    enableTodoEdit: false,
                    items: [{
                        title: 'Composed trays',
                        description: 'Hoary rattle exulting suspendisse elit paradises craft wistful. ' +
                            'Bayonets allures prefer traits wrongs flushed. Tent wily matched bold polite slab coinage ' +
                            'celerities gales beams.'
                    }]
                }
            ]
        });
        // Disabled drag & drop
        $('#todo-lists-demo-sorting').lobiList({
            sortable: false,
            lists: [{
                    title: 'Todo',
                    defaultStyle: 'lobilist-info',
                    controls: ['edit', 'styleChange'],
                    items: [{
                        title: 'Floor cool cinders',
                        description: 'Thunder fulfilled travellers folly, wading, lake.',
                        duedate: '2015-01-31'
                    }]
                },
                {
                    title: 'Controls disabled',
                    controls: false,
                    items: [{
                        title: 'Composed trays',
                        description: 'Hoary rattle exulting suspendisse elit paradises craft wistful. Bayonets allures prefer traits wrongs flushed. Tent wily matched bold polite slab coinage celerities gales beams.'
                    }]
                }
            ]
        });

        $('#actions-by-ajax').lobiList({
            actions: {
                load: '../example1/load.json',
                insert: '../example1/insert.php',
                delete: '../example1/delete.php',
                update: '../example1/update.php'
            },
            afterItemAdd: function() {
                console.log(arguments);
            }
        });

        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        $('.lobilist').perfectScrollbar();
    });
});
