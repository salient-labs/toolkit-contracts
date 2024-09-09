<?php declare(strict_types=1);

namespace Salient\Contract\Polyfill;

/**
 * @api
 */
interface FilesystemStreamWrapperInterface extends StreamWrapperInterface
{
    /**
     * Close directory handle
     *
     * This method is called in response to {@see closedir()}.
     *
     * Any resources which were locked, or allocated, during opening and use of
     * the directory stream should be released.
     *
     * @return bool `true` on success or `false` on failure.
     */
    public function dir_closedir(): bool;

    /**
     * Open directory handle
     *
     * This method is called in response to {@see opendir()}.
     *
     * @param string $path Specifies the URL that was passed to
     * {@see opendir()}.
     * @return bool `true` on success or `false` on failure.
     */
    public function dir_opendir(string $path, int $options): bool;

    /**
     * Read entry from directory handle
     *
     * This method is called in response to {@see readdir()}.
     *
     * @return string|false The next filename, or `false` if there is no next
     * file.
     */
    public function dir_readdir();

    /**
     * Rewind directory handle
     *
     * This method is called in response to {@see rewinddir()}.
     *
     * Should reset the output generated by
     * {@see HasDirectoryHandles::dir_readdir()}, i.e. the next call to
     * {@see HasDirectoryHandles::dir_readdir()} should return the first entry
     * in the location returned by {@see HasDirectoryHandles::dir_opendir()}.
     *
     * @return bool `true` on success or `false` on failure.
     */
    public function dir_rewinddir(): bool;

    /**
     * Create a directory
     *
     * This method is called in response to {@see mkdir()}.
     *
     * @param string $path Directory which should be created.
     * @param int $mode The value passed to {@see mkdir()}.
     * @param int $options A bitwise mask of values, such as
     * {@see \STREAM_MKDIR_RECURSIVE}.
     * @return bool `true` on success or `false` on failure.
     */
    public function mkdir(string $path, int $mode, int $options): bool;

    /**
     * Renames a file or directory
     *
     * This method is called in response to {@see rename()}.
     *
     * @param string $path_from The URL to the current file.
     * @param string $path_to The URL which the `path_from` should be renamed
     * to.
     * @return bool `true` on success or `false` on failure.
     */
    public function rename(string $path_from, string $path_to): bool;

    /**
     * Removes a directory
     *
     * This method is called in response to {@see rmdir()}.
     *
     * @param string $path The directory URL which should be removed.
     * @param int $options A bitwise mask of values, such as
     * {@see \STREAM_MKDIR_RECURSIVE}.
     * @return bool `true` on success or `false` on failure.
     */
    public function rmdir(string $path, int $options): bool;

    /**
     * Advisory file locking
     *
     * This method is called in response to {@see flock()},
     * {@see file_put_contents()} (when `flags` contains {@see \LOCK_EX}),
     * {@see stream_set_blocking()} and when closing the stream
     * ({@see \LOCK_UN}).
     *
     * @param int $operation One of the following:
     *
     * - {@see \LOCK_SH} to acquire a shared lock (reader).
     * - {@see \LOCK_EX} to acquire an exclusive lock (writer).
     * - {@see \LOCK_UN} to release a lock (shared or exclusive).
     * - {@see \LOCK_NB} if you don't want {@see flock()} to block while
     *   locking (not supported on Windows).
     * @return bool `true` on success or `false` on failure.
     */
    public function stream_lock(int $operation): bool;

    /**
     * Delete a file
     *
     * This method is called in response to {@see unlink()}.
     *
     * @param string $path The file URL which should be deleted.
     * @return bool `true` on success or `false` on failure.
     */
    public function unlink(string $path): bool;
}
