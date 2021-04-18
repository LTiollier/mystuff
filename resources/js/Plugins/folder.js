;(function(window) {

	/**
	 * FolderFx obj.
	 */
	function FolderFx(el) {
		this.DOM = {};
		this.DOM.el = el;
		this.DOM.wrapper = this.DOM.el.querySelector('.folder__icon');
		this.DOM.back = this.DOM.wrapper.querySelector('.folder__icon-img--back');
		this.DOM.cover = this.DOM.wrapper.querySelector('.folder__icon-img--cover');
		this.DOM.feedback = this.DOM.el.querySelector('.folder__feedback');
		this.DOM.preview = this.DOM.el.querySelector('.folder__preview');

		this._initEvents();
	}

	/**
	 * Remove/Stop any animation.
	 */
	FolderFx.prototype._removeAnimeTargets = function() {
		anime.remove(this.DOM.preview);
		anime.remove(this.DOM.wrapper);
		anime.remove(this.DOM.cover);
		anime.remove(this.DOM.el);
		if( this.DOM.feedback ) {
			anime.remove(this.DOM.feedback);
			this.DOM.feedback.style.opacity = 0;
		}
		if( this.DOM.letters ) {
			anime.remove(this.DOM.letters);
		}
	};

	FolderFx.prototype._initEvents = function() {
		const self = this;
		this._mouseenterFn = function() {
			self.intimeout = setTimeout(function() {
				self._removeAnimeTargets();
				self._in();
			}, 75);
		};
		this._mouseleaveFn = function() {
			clearTimeout(self.intimeout);
			self._removeAnimeTargets();
			self._out();
		};
		this.DOM.wrapper.addEventListener('mouseenter', this._mouseenterFn);
		this.DOM.wrapper.addEventListener('mouseleave', this._mouseleaveFn);
	};

    /************************************************************************
     * 8: DurgaFx.
     ************************************************************************/

    function DurgaFx(el) {
        FolderFx.call(this, el);
    }

    DurgaFx.prototype = Object.create(FolderFx.prototype);
    DurgaFx.prototype.constructor = DurgaFx;

    DurgaFx.prototype._in = function() {
        const self = this;

        anime({
            targets: this.DOM.cover,
            duration: 300,
            easing: 'easeOutExpo',
            rotateX: [0,-30]
        });
    };

    DurgaFx.prototype._out = function() {
        anime({
            targets: this.DOM.cover,
            duration: 300,
            easing: 'easeOutExpo',
            rotateX: 0
        });
    };

    window.DurgaFx = DurgaFx;

})(window);
