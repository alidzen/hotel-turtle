define(['jquery'], function() {
    'use strict';

    /**
     * Табы
     * @param {Object} $tabsContainer - Jquery объект, обератка всего блока
     * @constructor
     */
    var Tabs = function($tabsContainer) {
        this.$tabs = $tabsContainer.find('.b-tabs__item');
        this.$contents = $tabsContainer.find('.b-tabs__content');
        this.active = 'is-active';

        this.bindEvents();
    };
    /**
     * События
     */
    Tabs.prototype.bindEvents = function() {
        this.$tabs.on('click', this.stateTabs.bind(this));
    };

    /**
     * Узнаем состояние таба
     * @param {event} e
     */
    Tabs.prototype.stateTabs = function(e) {
        e.preventDefault();

        this.$tab = $(e.target);
        this.$tabId = this.$tab.data('tab');

        if (this.$tab.hasClass('is-disabled')) {
            return;
        }

        if (!this.$tab.hasClass(this.active)) {
            this.$tabs.removeClass(this.active);
            this.$tab.addClass(this.active);
        }

        this.changeStateContents(this.$tabId);
    };

    /**
     * Меняем состояние таба
     * @param {String} name - id таба
     */
    Tabs.prototype.changeStateContents = function(name) {
        this.$contents.removeClass(this.active);
        $('.b-tabs__content[data-tab-content=' + name + ']')
            .addClass(this.active);
    };

    return Tabs;
});

